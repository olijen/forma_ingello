<?php

namespace forma\modules\hr\services;

use forma\modules\hr\records\interview\Interview;
use forma\modules\product\records\Currency;
use forma\modules\product\records\PackUnit;
use forma\modules\project\records\projectvacancy\ProjectVacancy;
use forma\modules\warehouse\Module;
use Yii;
use forma\modules\product\records\Product;
use forma\modules\product\services\ProductService;
use forma\modules\hr\records\interviewvacancy\InterviewVacancy;
use forma\modules\hr\records\interviewvacancy\InterviewVacancySearch;
use yii\web\HttpException;
use yii\widgets\ActiveForm;
use forma\modules\product\Module as ProductModule;

class NomenclatureService
{
    public static function addPosition($post)
    {
        $model = self::getUnitByProduct($post);
        if (!$model->isNewRecord) {
            $addendQty = $model->quantity;
        }

        if ($model->load($post) && $model->validate() && isset($addendQty)) {
            $model->quantity += $addendQty;
        }

        $model->pack_unit_id = $model->product->pack_unit_id;

        $model->currency_id = 1;

        $model->save();

        return $model;
    }

    public static function getUnit($unitId)
    {
        return InterviewVacancy::findOne($unitId);
    }

    public static function getUnitByProduct($post)
    {
        $interviewId = $post['InterviewVacancy']['interview_id'];
        $productId = $post['InterviewVacancy']['vacancy_id'];

        $unit = InterviewVacancy::findOne([
            'interview_id' => $interviewId,
            'vacancy_id' => $productId,
        ]);
        return $unit ?? self::createPosition($interviewId);
    }

    public static function getDataProvider($interviewId)
    {
        $search = new InterviewVacancySearch;
        $search->interview_id = $interviewId;

        return $search->search(Yii::$app->request->post());
    }

    public static function createPosition($interviewId = null)
    {
        $model = new InterviewVacancy;
        $model->interview_id = $interviewId;
        return $model;
    }

    public static function deletePosition($id)
    {
        $model = InterviewVacancy::findOne($id);
        $model->delete();
        return $model;
    }

    public static function getByProductId($productId, $interviewId)
    {
        $unit = InterviewVacancy::findOne([
            'vacancy_id' => $productId,
            'interview_id' => $interviewId
        ]);
        return $unit ?? self::createPosition($interviewId);
    }

    public static function addPositionByPackUnit($interviewId, $data)
    {
        if (!isset($data['InterviewVacancy']['packUnitId'])) {
            $data['InterviewVacancy']['packUnitId'] = null;
        }

        $packUnitId = $data['InterviewVacancy']['packUnitId'];

        $productId = $data['InterviewVacancy']['vacancy_id'];

        /** @var Product $product */
        $product = ProductService::getVariationByPackUnit($productId, $packUnitId);
        $data['InterviewVacancy']['vacancy_id'] = $product->id;

        $model = self::getByProductId($data['InterviewVacancy']['vacancy_id'], $interviewId);
        if (!$model->load($data) || !$model->save()) {
            var_dump($model->getErrors());
            die;
        }
        return $model;
    }
    
    public static function getProductCost($productId, $interviewId, $costType)
    {
        $warehouseId = Interview::findOne($interviewId)->project_id;
        $costField = +$costType === 0 ? 'consumer_cost' : 'trade_cost';
        $productOnWarehouse = ProjectVacancy::findOne(['vacancy_id' => $productId, 'project_id' => $warehouseId]);

        return $productOnWarehouse->$costField;
    }

    public static function deleteAllByInterview($interviewId)
    {
        return InterviewVacancy::deleteAll(['interview_id' => $interviewId]);
    }

    public static function changeCell($post, $outputAttribute = false)
    {
        $response = ['output' => '', 'message' => ''];

        $post = Yii::$app->request->post();
        $unitId = $post['editableKey'];

        $unit = self::getUnit($unitId);
        if (!$unit) {
            return false;
        }

        $data = ['InterviewVacancy' => array_shift($post['InterviewVacancy'])];

        if (!$unit->load($data) || !$unit->save()) {
            $response['message'] = self::getErrorMessage($unit);
        }
        if ($outputAttribute) {
            $response['output'] = $unit->$outputAttribute;
        }

        return $response;
    }

    private static function getErrorMessage($model)
    {
        /** @var InterviewVacancy $model */
        if (!$model->hasErrors()) {
            return false;
        }
        $validation = ActiveForm::validate($model);
        return array_shift($validation);
    }


    public static function changePack($unitId, $post)
    {
        /* @var $productModule \forma\modules\product\Module */
        $productModule = Yii::$app->getModule('product');

        $response = ['success' => true, 'output' => '', 'message' => ''];

        $packId = $post['InterviewVacancy']['pack_unit_id'] ?: null;

        $unit = static::getUnit($unitId);
        $pack = PackUnit::findOne($packId);

        $minConvertedQty = ($pack->bottles_quantity ?? 1)
            / ($unit->packUnit->bottles_quantity ?? 1);

        if ($unit->quantity < $minConvertedQty) {
            $response['success'] = false;
            $response['message'] = "Минимальное количество для конвертации - $minConvertedQty";
            return $response;
        }

        $convertedQty = $unit->quantity
            * ($unit->packUnit->bottles_quantity ?? 1)
            / ($pack->bottles_quantity ?? 1);

        $equalConvertedQty = (int)$convertedQty;

        $remainder = ($unit->quantity * ($unit->packUnit->bottles_quantity ?? 1))
            % ($pack->bottles_quantity ?? 1);

        $currentVariant = ProjectVacancy::find()
            ->where(['project_id' => $unit->interview->project_id])
            ->andWhere(['vacancy_id' => $unit->vacancy_id])
            ->one();

        $currentVariant->quantity -= $unit->quantity;
        $currentVariant->save();

        $requestedVariant = ProjectVacancy::find()
            ->joinWith(['vacancy'], true, 'INNER JOIN')
            ->where([
                'OR',
                'vacancy.id' => $unit->vacancy_id,
                'vacancy.parent_id' => $unit->vacancy_id
            ])
            ->andWhere(['vacancy.pack_unit_id' => $packId])
            ->andWhere(['project_vacancy.project_id' => $unit->interview->project_id])
            ->one();

        if (!$requestedVariant) {
            $requestedProduct = $productModule->getByPack($unit->vacancy, $pack);

            $requestedVariant = new ProjectVacancy();
            $requestedVariant->setAttributes([
                'project_id' => $unit->interview->project_id,
                'vacancy_id' => $requestedProduct->id,
                'quantity' => 0,
                'currency_id' => 1,
            ]);
            $requestedVariant->save();
        }

        $requestedVariant->quantity += $equalConvertedQty;
        $requestedVariant->save();

        $originalVariant = ProjectVacancy::find()
            ->joinWith(['vacancy'], true, 'INNER JOIN')
            ->where(['vacancy.id' => $unit->vacancy->getOriginal()->id])
            ->andWhere(['project_id' => $unit->interview->project_id])
            ->one();

        if (!$originalVariant) {
            $originalProduct = $productModule->getByPack($unit->vacancy, null);

            $originalVariant = new ProjectVacancy();
            $originalVariant->setAttributes([
                'project_id' => $unit->interview->project_id,
                'vacancy_id' => $originalProduct->id,
                'quantity' => 0,
                'currency_id' => 1,
            ]);
            $originalVariant->save();
        }

        $originalVariant->quantity += $remainder;
        $originalVariant->save();

        $requestedUnit = InterviewVacancy::find()
            ->where(['interview_id' => $unit->interview_id])
            ->andWhere(['vacancy_id' => $requestedVariant->vacancy_id])
            ->one();

        if ($requestedUnit) {
            $requestedUnit->quantity += $equalConvertedQty;
            $requestedUnit->save();
            $unit->delete();

            return $response;
        }

        if ($unit->packUnit && !$pack) {
            $unit->unlink('packUnit', $unit->packUnit);
        } else {
            $unit->link('packUnit', $pack);
        }
        $unit->link('product', $requestedVariant->product);
        $unit->quantity = $equalConvertedQty;
        $unit->save();

        return $response;
    }

    /**
     * Converts nomenclature product by pack unit.
     *
     * @param InterviewVacancy $unit
     * @param PackUnit|null $pack
     * @return bool
     * @throws \Exception
     * @throws \Throwable
     */
    public static function convertByPack(InterviewVacancy $unit, PackUnit $pack = null)
    {
        /** @var ProductModule $module */
        $module = Yii::$app->getModule('product');

        /* @var Product $product */
        $product = $module->getByPack($unit->product, $pack);

        $bottlesUnitQty = $unit->packUnit ?
            $unit->quantity : $unit->quantity * $unit->packUnit->bottles_quantity;

        $newUnitQty = $pack ?
            ($bottlesUnitQty / $pack->bottles_quantity) : $bottlesUnitQty;

        if ($unitIn = static::getByProduct($unit->interview, $product)) {
            $unitIn->quantity += $unit->quantity;
            return $unitIn->save() && $unit->delete();
        }

        if (!$pack && $unit->packUnit) {
            $unit->unlink('packUnit', $unit->packUnit);
        } else {
            $unit->link('packUnit', $pack);
        }

        $unit->link('product', $product);

        return true;
    }

    /**
     * Returns unit record by product.
     *
     * @param interview $interview
     * @param Product $product
     * @return InterviewVacancy|array|null
     */
    public static function getByProduct(interview $interview, Product $product)
    {
        return InterviewVacancy::find()
            ->where(['interview_id' => $interview->id])
            ->andWhere(['vacancy_id' => $product->id])
            ->one();
    }

    public static function changeCurrencyByPost($unitId, $post)
    {
        $response = ['success' => true, 'output' => '', 'message' => ''];

        $currencyId = $post['InterviewVacancy']['currency_id'] ?? false;
        if ($currencyId === false) {
            throw new HttpException(400, 'InterviewVacancy[currency_id] parameter is required.');
        }

        $unit = static::getUnit($unitId);
        $currency = Currency::findOne($currencyId);

        static::changeCurrency($unit, $currency);

        return $response;
    }

    public static function changeCurrency(InterviewVacancy $unit, Currency $currency)
    {
        $unit->link('currency', $currency);
    }
}
