<?php

namespace forma\modules\selling\services;

use forma\modules\core\records\Accessory;
use forma\modules\core\records\User;
use forma\modules\customer\records\Customer;
use forma\modules\product\records\Currency;
use forma\modules\selling\forms\SalesProgress;
use forma\modules\selling\records\selling\Selling;
use forma\modules\selling\records\selling\SellingSearch;
use forma\modules\selling\records\state\State;
use forma\modules\warehouse\records\Warehouse;
use forma\modules\warehouse\records\WarehouseProduct;
use forma\modules\warehouse\services\RemainsService;
use forma\modules\warehouse\services\WarehouseService;
use yii\data\ActiveDataProvider;
use yii\web\ForbiddenHttpException;
use Yii;

class SellingService
{
    public static function search()
    {
        return new SellingSearch;
    }

    public static function get($id = null)
    {
        return $id ? Selling::findOne($id) : self::create();
    }

    public static function create()
    {
        $selling = new Selling();
        $selling->date_create = Yii::$app->formatter->asDatetime(time(), 'php:Y-m-d H:i:s');
        return $selling;
    }

    public static function save($id, $post)
    {
        $model = self::get($id);
        $model->selling_token = $model->selling_token ?? Yii::$app->getSecurity()->generateRandomString();
        if (Yii::$app->user->isGuest && Yii::$app->controller->action->id == 'test') {
            $model->tmpUserId = $post['Selling']['tmpUserId'];
        }

        $userId = $model->tmpUserId??Yii::$app->user->id;

        $state_id = State::find()
            ->where(['user_id'=> $userId])
            ->orderBy('order')
            ->one()
            ->id;
        $model->state_id = $state_id;

        if (!$model->isNewRecord) {
            $warehouseId = $model->warehouse_id;
        }

        $userState = State::find()
            ->where(['user_id' => Yii::$app->user->getId()])
            ->orderBy('order')
            ->one();

        if ($userState) {
            $model->state_id = $userState->id;
        }
        $model->name .= strval(time());

        $model->load($post);
        if (!$model->save()) {
            var_dump($model->getErrors());
            die;
        }

        if (isset($warehouseId) && $model->warehouse_id != $warehouseId) {
            NomenclatureService::deleteAllBySelling($model->id);
        }

        return $model;
    }

    public static function delete($id)
    {
        $model = self::get($id);
        $model->delete();

        return $model;
    }


    public static function getCompleteCount()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Selling::find()->where(['customer_id' => 15 ]),
        ]);



        return (new SellingSearch())->search([])->getTotalCount();
    }

//    public static function changeState($id, $state)
//    {
//        $model = self::get($id);
//        $stateClass = 'forma\modules\selling\records\selling\State'.ucfirst($state);
//        $model->applyState(new $stateClass);
//        $model->save();
//        return $model;
//    }

    public static function createByRemains($post)
    {
        /** @var Warehouse $warehouse */
        $warehouse = WarehouseService::get($post['warehouse_id']);
        if (!$warehouse->belongsToUser()) {
            throw new ForbiddenHttpException();
        }

        $selling = self::create();
        $customer = $post['customer'];

        $selling->setAttributes([
            'name' => 'Новая продажа с ' . Yii::$app->formatter->asDatetime(time(), 'php:d.m.Y H:i:s'),
            'warehouse_id' => $warehouse->id,
            'customer_id' => $customer->id,
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
                'currency_id' =>
                    Currency::getModelByUser('forma\modules\product\records\Currency',
                        User::findOne(Yii::$app->user->id), true)->id
            ]]);
        }

        return $selling;
    }




    // todo: Вынести в виджет
    public static function getTotalSum(Selling $selling)
    {
        $sum = 0;
        foreach ($selling->getUnits() as $unit) {
            $sum += $unit->cost * $unit->quantity;
        }
        return $sum;
    }

    public static function getSellingProgress()
    {
        
        $sellingProgress = new SalesProgress();
        return $sellingProgress;
    }
    // todo: Вынести в виджет


    public static function getLastClientsToHeader(){
        $searchModelClientsHeader = self::search();
        $clientsHeader = $searchModelClientsHeader->searchLastClients();
        return $clientsHeader;
    }

    public static function getSellingInWeek(){
        $searchModel = self::search();
        $weekly = $searchModel->weeklySales();

        $dates = [];
        $week = [0, 0, 0, 0, 0, 0, 0];

        if (!empty($weekly)) {
            foreach ($weekly as $sale) {
                $dates[] = date("w", strtotime(substr($sale->date_create, 0, 10)));
            }

            foreach ($dates as $dateSale) {
                $week[$dateSale]++;
            }
        }

        return $week;
    }

    public static function getSellingInWarehouse(){
        $searchModel = self::search();
        $sellingInWarehouse = $searchModel->salesInWarehouse();
        return $sellingInWarehouse;
    }

    /**
     * Получить владельца продажи.
     * Get user, that create selling
     */
    public static function getSellingOwner()
    {
        $selling = Selling::getSellingBySellingToken($_GET['selling_token']);
        Yii::debug($selling);
        $userId = Accessory::find()
            ->where("entity_class = 'forma\\\\modules\\\\selling\\\\records\\\\selling\\\\Selling'")
            ->andWhere(['entity_id' => $selling->id])
            ->limit(1)
            ->one()->user_id;

        return User::findOne($userId);
    }
}
