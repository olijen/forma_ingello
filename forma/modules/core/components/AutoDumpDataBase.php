<?php


namespace forma\modules\core\components;


use forma\modules\core\records\Accessory;
use forma\modules\core\records\Regularity;
use forma\modules\product\records\ProductPackUnit;
use forma\modules\warehouse\records\Warehouse;
use forma\modules\warehouse\records\WarehouseProduct;

class AutoDumpDataBase
{
    public $accessoryOldKeys;
    public $accessoryNewKeys;
    public $oldKeys = [];
    public $newKeys = [];
    public $newParent = [];
    public $oldParent = [];

    public function getAccessoryKeys()
    {
        $model = new Accessory();

        $arrayModels = $model::find()->where(['user_id' => 1])
            ->all();
//        de('$arrayModels');
        $accessoryKeys = [];
        foreach ($arrayModels as $model) {
            $accessoryKeys[$model->entity_class] [$model->entity_id] = $model->entity_id;
        }

        foreach ($accessoryKeys as $entityClass => $modelId) {
            $modelRout = '\\' . $entityClass;
            $models = $modelRout::findAll($modelId);

            foreach ($models as $model) {
                $key = $model->id;

                if (array_key_exists('parent_id', $model->attributes)) {
                    $model = $this->changeAttributes(
                        $this->newParent,
                        $model,
                        'parent_id');
                    $newModel = $this->saveWhitParent($model);
                } else {
                    $newModel = $this->saveNewRecord($model);
                }

                $this->accessoryNewKeys[$entityClass][$key] = $newModel->id;
                $this->accessoryOldKeys[$entityClass][$key] = $key;
            }
        }
    }

    public function start()
    {
        $this->getAccessoryKeys();
//        $warehouse = $this->regularity();
//        $warehouse = $this->field();
//        $warehouse = $this->productPackUnit();
//        $warehouse = $this->warehouse();
//        $warehouse = $this->overheadCost();
////        $warehouse = $this->workerVacancy();
//        $warehouse = $this->purchase();
        de($warehouse);

        de('$modelRoute');
    }

    public function modelWhitUser($modelsRoutWhitUser)
    {
        return $modelWhitUser = $modelsRoutWhitUser::find()->where(['user_id' => 1])->all(); // найдем все варехаус user
    }

    public function forSaveAndGetKey($modelsForSave, $name)
    {
        for ($i = 0; $i < count($modelsForSave); $i++) {
            $oldKey = $modelsForSave[$i]->id;
            $newModel = $this->saveNewRecord($modelsForSave[$i]);
            $this->saveKey($name, $oldKey, $newModel->id);
        }
    }

    public function saveKey($name, $oldKey, $newKey)
    {
        $this->oldKeys[$name][$oldKey] = $oldKey;
        $this->newKeys[$name][$oldKey] = $newKey;
    }

    public function saveWhitParent($model)
    {
        $oldParent = $model->id;
        $this->oldParent[$oldParent] = $oldParent;
        $newModel = $this->saveNewRecord($model);
        $this->newParent[$oldParent] = $newModel->id;
        return $newModel;
    }

    public function saveNewRecord($model)
    {
        $model->isNewRecord = true;
        $model->id = null;
        if (array_key_exists('user_id', $model->attributes)) $model->user_id = \Yii::$app->user->identity->id;

        if (!$model->save()) {
            de($model->errors, false);
            de($model);
        }
        return $model;
    }

    public function getIdsForModelAttributes($modelWhitUser, string $attributes)
    {
        $ids = [];
        foreach ($modelWhitUser as $model) {
            $ids [] = $model->$attributes;
        }
        return $ids;
    }

    public function warehouse()
    {
        $modelsRoute = [
            '\forma\modules\warehouse\records\Warehouse',
            '\forma\modules\warehouse\records\WarehouseProduct',
        ];
        $modelWhitUser = $this->modelWhitUser('\forma\modules\warehouse\records\WarehouseUser');
        $ids = $this->getIdsForModelAttributes($modelWhitUser, 'warehouse_id');
        $warehouseModels = Warehouse::findAll($ids);
        $this->forSaveAndGetKey($warehouseModels, 'warehouse_id');

        $warehouseProductModels = $this->findModels(new WarehouseProduct,
            ['warehouse_id' => $ids, 'product_id' => $this->accessoryOldKeys['forma\modules\product\records\Product']]);
        foreach ($warehouseProductModels as $warehouseProductModel) {
            $warehouseProductModel = $this->changeAttributes(
                $this->accessoryNewKeys['forma\modules\product\records\Product'],
                $warehouseProductModel,
                'product_id');

            $warehouseProductModel = $this->changeAttributes(
                $this->newKeys['warehouse_id'],
                $warehouseProductModel,
                'warehouse_id');

            $this->saveNewRecord($warehouseProductModel);
        }
        return true;
    }

    public function changeAttributes($key, $model, string $attribute)
    {
        foreach ($key as $oldKey => $newKey) {
            if ($model->$attribute == $oldKey) {
                $model->$attribute = $newKey;
                return $model;
            }
        }
        return $model;
    }

    public function findModels($model, $conditions)
    {
        return $model::find()->where($conditions)->all();
    }

    public function regularity()
    {
        ['\forma\modules\core\records\Regularity',    //user_id
            '\forma\modules\core\records\Item',];      //regularity_id    parent_id

        $regularity = $this->modelWhitUser('\forma\modules\core\records\Regularity');
        $this->forSaveAndGetKey($regularity, 'regularity_id');

        $itemsModels = $this->findModels('\forma\modules\core\records\Item', ['regularity_id' => $this->oldKeys['regularity_id']]);

        $attributes = [['key' => $this->newKeys['regularity_id'], 'attribute' => 'regularity_id'],
            ['key' => $this->newParent, 'attribute' => 'parent_id']];

//        $this->thisForeach($itemsModels, $attributes, false, true);

        foreach ($itemsModels as $itemsModel) {
            $itemsModel = $this->changeAttributes(
                $this->newKeys['regularity_id'],
                $itemsModel,
                'regularity_id');

            $itemsModel = $this->changeAttributes(
                $this->newParent,
                $itemsModel,
                'parent_id');

            $this->saveWhitParent($itemsModel);

        }

        return true;
    }

    public function field()
    {
        ['\forma\modules\product\records\Field',    //  category_id
            '\forma\modules\product\records\FieldProductValue', // field_id  product_id
            '\forma\modules\product\records\FieldValue',];  // field_id

        $fieldModels = $this->findModels('\forma\modules\product\records\Field',
            ['category_id' => $this->accessoryOldKeys['forma\modules\product\records\Category']]);

        foreach ($fieldModels as $fieldModel) {
            $fieldModel = $this->changeAttributes(
                $this->accessoryNewKeys['forma\modules\product\records\Category'],
                $fieldModel,
                'category_id');

            $this->saveNewRecord($fieldModel);
        }
        return true;
    }

    public function productPackUnit()
    {
        ['\forma\modules\product\records\ProductPackUnit',];  //product_id   pack_unit_id
//                '\forma\modules\product\records\PackUnit',

        $productPackUnits = $this->findModels(new ProductPackUnit(),
            ['pack_unit_id' => $this->accessoryOldKeys['forma\modules\product\records\PackUnit'],
                'product_id' => $this->accessoryOldKeys['forma\modules\product\records\Product']]);


        foreach ($productPackUnits as $productPackUnit) {
            $productPackUnit = $this->changeAttributes(
                $this->accessoryNewKeys['forma\modules\product\records\PackUnit'],
                $productPackUnit,
                'pack_unit_id');

            $productPackUnit = $this->changeAttributes(
                $this->accessoryNewKeys['forma\modules\product\records\Product'],
                $productPackUnit,
                'product_id');

            $this->saveNewRecord($productPackUnit);
        }
        return true;
    }

    public function workerVacancy()
    {
        ['\forma\modules\worker\records\WorkerVacancy']; // worker_id   vacancy_id

        $workerVacancies = $this->findModels('\forma\modules\worker\records\WorkerVacancy',
            ['worker_id' => $this->accessoryOldKeys['forma\modules\worker\records\Worker'],
                'vacancy_id' => $this->accessoryOldKeys['forma\modules\vacancy\records\Vacancy']]);

        $attributes = [[$this->accessoryNewKeys['forma\modules\worker\records\Worker'], 'worker_id'],
            ['key' => $this->accessoryNewKeys['forma\modules\vacancy\records\Vacancy'], 'attribute' => 'vacancy_id']];

        $this->thisForeach($workerVacancies, $attributes, );
        foreach ($workerVacancies as $workerVacancy) {
            $workerVacancy = $this->changeAttributes(
                $this->accessoryNewKeys['forma\modules\worker\records\Worker'],
                $workerVacancy,
                'worker_id');

            $workerVacancy = $this->changeAttributes(
                $this->accessoryNewKeys['forma\modules\vacancy\records\Vacancy'],
                $workerVacancy,
                'vacancy_id');

            $this->saveNewRecord($workerVacancy);
        }
        return true;
    }

    public function overheadCost(){

        $overheadCosts = $this->findModels('\forma\modules\overheadcost\records\OverheadCost',
        ['currency_id' => $this->accessoryOldKeys['forma\modules\product\records\Currency']]);

de($overheadCosts);

        foreach ($overheadCosts as $overheadCost) {
            $overheadCost = $this->changeAttributes(
                $this->accessoryNewKeys['forma\modules\product\records\Currency'],
                $overheadCost,
                'currency_id');

            $this->forSaveAndGetKey($overheadCost, 'overhead_cost_id');
        }
         return true;
    }

    public function purchase()
    {
        ['\forma\modules\purchase\records\purchase\Purchase',     // supplier_id    warehouse_id
            '\forma\modules\purchase\records\purchase\PurchaseOverheadCost',   // purchase_id   overhead_cost_id
            '\forma\modules\purchase\records\purchaseproduct\PurchaseProduct',];//  purchase_id  product_id  pack_unit_id  overhead_cost_id

        $purchases = $this->findModels('\forma\modules\purchase\records\purchase\Purchase',
            ['supplier_id' => $this->accessoryOldKeys['forma\modules\supplier\records\Supplier'],
                'warehouse_id' => $this->oldKeys['warehouse_id']]);

        foreach ($purchases as $purchase) {
            $purchase = $this->changeAttributes(
                $this->accessoryNewKeys['forma\modules\supplier\records\Supplier'],
                $purchase,
                'supplier_id');

            $purchase = $this->changeAttributes(
                $this->newKeys['warehouse_id'],
                $purchase,
                'warehouse_id');

            $this->forSaveAndGetKey($purchase, 'purchase_id');
        }

        $purchaseOverheadCosts = $this->findModels('\forma\modules\purchase\records\purchase\PurchaseOverheadCost',
            ['overhead_cost_id' => $this->oldKeys['overhead_cost_id'],
                'purchase_id' => $this->oldKeys['purchase_id']]);

        foreach ($purchaseOverheadCosts as $purchaseOverheadCost) {
            $purchaseOverheadCost = $this->changeAttributes(
                $this->newKeys['overhead_cost_id'],
                $purchaseOverheadCost,
                'overhead_cost_id');

            $purchaseOverheadCost = $this->changeAttributes(
                $this->newKeys['purchase_id'],
                $purchaseOverheadCost,
                'purchase_id');

            $this->saveNewRecord($purchaseOverheadCost);
        }

        $purchaseProducts = $this->findModels('\forma\modules\purchase\records\purchase\PurchaseProduct',
            ['pack_unit_id' => $this->accessoryOldKeys['forma\modules\product\records\PackUnit'],
                'purchase_id' => $this->oldKeys['purchase_id'],
                'product_id' => $this->accessoryOldKeys['forma\modules\product\records\Product'],
                'overhead_cost_id' => $this->oldKeys['overhead_cost_id']]
        );

        //purchase_id  product_id  pack_unit_id  overhead_cost_id
        foreach ($purchaseProducts as $purchaseProduct) {
            $purchaseProduct = $this->changeAttributes(
                $this->newKeys['purchase_id'],
                $purchaseProduct,
                'purchase_id');

            $purchaseProduct = $this->changeAttributes(
                $this->accessoryNewKeys['forma\modules\product\records\PackUnit'],
                $purchaseProduct,
                'pack_unit_id');

            $purchaseProduct = $this->changeAttributes(
                $this->accessoryNewKeys['forma\modules\product\records\Product'],
                $purchaseProduct,
                'product_id');

            $purchaseProduct = $this->changeAttributes(
                $this->newKeys['overhead_cost_id'],
                $purchaseProduct,
                'overhead_cost_id');

            $this->saveNewRecord($purchaseProduct);
        }

        return true;
    }

    public function thisForeach($models, $attributes = null, $saveWhitKey = false, $saveParent = false)
    {
        foreach ($models as $model) {
            foreach ($attributes as $attribute) {
                $model = $this->changeAttributes(
                    $attribute['key'],
                    $model,
                    $attribute['attribute']);
            }

                $this->saveNewRecord($model);
        }
    }

    public function requestStrategy(){

        $requestStrategeis = $this->findModels('\forma\modules\hr\records\talk\requeststrategy\RequestStrategy',
            ['strategy_id' => $this->accessoryOldKeys['\forma\modules\hr\records\strategy\Strategy'],
                'reguest_id' => $this->accessoryOldKeys[ '\forma\modules\hr\records\talk\Request']]);


        foreach ($requestStrategeis as $requestStrategy) {
            $requestStrategy = $this->changeAttributes(
                $this->accessoryNewKeys['\forma\modules\hr\records\strategy\Strategy'],
                $requestStrategy,
                'strategy_id');

            $requestStrategy = $this->changeAttributes(
                $this->accessoryNewKeys['\forma\modules\hr\records\talk\Request'],
                $requestStrategy,
                'reguest_id');

            $this->saveNewRecord($requestStrategy);
        }

        return true;
    }

    public function interview(){

        $requestStrategeis = $this->findModels('\forma\modules\hr\records\talk\requeststrategy\RequestStrategy',
            ['strategy_id' => $this->accessoryOldKeys['\forma\modules\hr\records\strategy\Strategy'],
                'reguest_id' => $this->accessoryOldKeys[ '\forma\modules\hr\records\talk\Request']]);


        foreach ($requestStrategeis as $requestStrategy) {
            $requestStrategy = $this->changeAttributes(
                $this->accessoryNewKeys['\forma\modules\hr\records\strategy\Strategy'],
                $requestStrategy,
                'strategy_id');

            $requestStrategy = $this->changeAttributes(
                $this->accessoryNewKeys['\forma\modules\hr\records\talk\Request'],
                $requestStrategy,
                'reguest_id');

            $this->saveNewRecord($requestStrategy);
        }

        return true;
    }


    public function saveRelation(string $relation = null, $relationAttributes = null)
    {
//    if (!is_null($relation) && $relationAttributes){
//        if(is_array($newModal->$relation)){
//
//        }else{
//            if (is_array($relationAttributes)){
//                foreach ($relationAttributes as $attribute){
//                    $newModal->$relation->$attribute = 'daw';
//                        }
//            }
//            $this->saveNewRecord($model->$relation);
//        }
//    }
    }
}