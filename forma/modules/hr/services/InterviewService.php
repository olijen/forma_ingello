<?php

namespace forma\modules\hr\services;

use forma\modules\worker\records\Worker;
use forma\modules\hr\forms\InterviewProgress;
use forma\modules\hr\records\interview\Interview;
use forma\modules\hr\records\interview\InterviewSearch;
use forma\modules\project\records\project\Project;
use forma\modules\project\records\projectvacancy\ProjectVacancy;
use yii\data\ActiveDataProvider;
use yii\web\ForbiddenHttpException;
use Yii;

class InterviewService
{
    public static function search()
    {
        return new InterviewSearch;
    }

    public static function get($id = null)
    {
        return $id ? Interview::getAccessToOne(['id' => $id]) : self::create();
    }

    public static function create()
    {
        $selling = new Interview();
        $selling->date_create = Yii::$app->formatter->asDatetime(time(), 'php:Y-m-d H:i:s');
        return $selling;
    }

    public static function save($id, $post)
    {
        $model = self::get($id);

        if (!$model->isNewRecord) {
            $projectId = $model->project_id;
        }

        $model->load($post);

        $model->name = '-';

        if (!$model->save()) {

        }

        if (isset($projectId) && $model->project_id != $projectId) {
            NomenclatureService::deleteAllByInterview($model->id);
        }

        return $model;
    }

    public static function delete($id)
    {
        $model = self::get($id);
        $model->delete();

        return $model;
    }

    public static function changeState($id, $state)
    {
        $model = self::get($id);
        $stateClass = 'forma\modules\hr\records\interview\State'.ucfirst($state);
        Yii::debug('-------------------------DEBUG--------------------');
        $model->applyState(new $stateClass);
        $model->save();
        return $model;
    }

    public static function createByRemains($post)
    {
        /** @var Warehouse $warehouse */
        $warehouse = WarehouseService::get($post['warehouse_id']);
        if (!$warehouse->belongsToUser()) {
            throw new ForbiddenHttpException();
        }

        $selling = self::create();
        $customer = Worker::findOne(1);

        $selling->setAttributes([
            'name' => 'Новый найм с ' . Yii::$app->formatter->asDatetime(time(), 'php:d.m.Y H:i:s'),
            'warehouse_id' => $warehouse->id,
            'worker_id' => $customer->id,
        ]);
        if (!$selling->save()) {
            var_dump($selling->getErrors());
            die;
        }

        $warehouseProducts = WarehouseProduct::find()
            ->where(['warehouse_id' => $warehouse->id])
            ->andWhere(['IN', 'id', $post['selection']])
            ->all();

        foreach ($warehouseProducts as $warehouseProduct) {
            $productQty = RemainsService::getAvailable($warehouseProduct->product_id, $warehouse->id);
            if (!$productQty) {
                continue;
            }

            NomenclatureService::addPosition(['SellingProduct' => [
                'selling_id' => $selling->id,
                'product_id' => $warehouseProduct->product_id,
                'quantity' => $productQty,
                'cost' => $warehouseProduct->recommended_cost,
                'cost_type' => 0,
            ]]);
        }

        return $selling;
    }

    public static function getCompleteCount()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Interview::find()->where(['state' => 1]),
        ]);

        return $dataProvider->getTotalCount();
    }

    // todo: Вынести в виджет
    public static function getTotalSum(Interview $interview)
    {
        $sum = 0;
        foreach ($interview->getUnits() as $unit) {
            $sum += $unit->cost * $unit->quantity;
        }
        return $sum;
    }

    public static function getInterviewProgress()
    {
        
        $interviewProgress = new InterviewProgress();
        return $interviewProgress;
    }
    // todo: Вынести в виджет



    public static function getInterviewWork(){
        $searchModel = self::search();
        $searchModel->searchWork();
    }
}
