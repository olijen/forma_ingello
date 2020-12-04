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
    protected $deleteAutoDamp = false;

    public function getAccessoryKeys()
    {
        $model = new Accessory();

        $arrayModels = $model::find()->where(['user_id' => 1])
            ->andWhere(['not like', 'entity_class', ['\Answer', '\ProjectVacancy',
                '\Interview', '\selling\Selling', '\requeststrategy\RequestStrategy', '\Country']])
            ->all();

        $accessoryKeys = [];
        foreach ($arrayModels as $model) {
            $accessoryKeys[$model->entity_class] [$model->entity_id] = $model->entity_id;
        }

        foreach ($accessoryKeys as $entityClass => $modelId) {
            $modelRout = '\\' . $entityClass;
            $models = $modelRout::find()->where(['id' => $modelId])->orderBy(['id' => SORT_ASC])->all();;

            foreach ($models as $model) {

                $key = $model->id;
                if ($this->deleteAutoDamp == false) {
                    if (array_key_exists('parent_id', $model->attributes)) {
                        $model = $this->changeAttributes(
                            $this->newParent,
                            $model,
                            'parent_id');
                        $newModel = $this->saveWhitParent($model);
                    } else {
                        $newModel = $this->saveNewRecord($model);
                    }
                    $this->accessoryOldKeys[$entityClass][$key] = $key;
                    $this->accessoryNewKeys[$entityClass][$key] = $newModel->id;

                } else {
                    $this->accessoryOldKeys[$entityClass][$key] = $key;
                    $this->accessoryNewKeys[$entityClass][$key] = $key;

                }
            }
        }
    }

    public function start()
    {
        $this->getAccessoryKeys();
        $this->state();
        $this->warehouse();
        $this->regularity();
        $this->field();
        $this->productPackUnit();
        //$this->workerVacancy();
        $this->overheadCost();
        $this->purchase();
        $this->requestStrategy();
        $this->answer();
        $this->interview();
        $this->inventorization();
        $this->project();
        $this->selling();
        $this->transit();

        if ($this->deleteAutoDamp) $this->deleteAccessory();
        
        return true;
    }

    public function deleteAccessory()
    {
        foreach ($this->accessoryNewKeys as $key => $accessory) {
            $model = new $key;
            $model->deleteAll(['not in', 'id', $accessory]);
        }

        $accessory = new Accessory;
        $accessory->deleteAll(['not in', 'user_id', 1]);
    }

    public function delete($models)
    {
        $modelArray = [];

        foreach ($models as $model) {
            $modelArray[] = $model->id;
        }
        if (isset($models[0]) && !empty($models[0]) && !empty($modelArray)) {
            return $models[0]->deleteAll(['not in', 'id', $modelArray]);
        }
        return true;
    }

    public function modelWhitUser($modelsRoutWhitUser)
    {
        return $modelWhitUser = $modelsRoutWhitUser::find()->where(['user_id' => 1])->all(); // найдем все варехаус user
    }

    public function forSaveAndGetKey($modelsForSave, $name)
    {
        if (!is_array($modelsForSave)) {
            $oldKey = $modelsForSave->id;
            $newModel = $this->saveNewRecord($modelsForSave);
            $this->saveKey($name, $oldKey, $newModel->id);
            return true;
        }
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
        if ($this->deleteAutoDamp == false) {
            $model->isNewRecord = true;

            if (array_key_exists('id', $model->attributes)) $model->id = null;
            if (array_key_exists('user_id', $model->attributes)) $model->user_id = \Yii::$app->user->identity->id;
            \Yii::debug($model);
//            de($model);
            if (!$model->save()) {
                de($model->errors, false);
                de($model);
            }
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

    public function state()
    {
        $states = $this->findModels('forma\modules\selling\records\state\State', ['user_id' => 1]);

        foreach ($states as $state) {
            $state = $this->changeAttributes(
                ['1' => \Yii::$app->user->identity->id],
                $state,
                'user_id');

            $this->forSaveAndGetKey($state, 'state_id');
        }

        if ($this->deleteAutoDamp) return $this->delete($states);


        $stateToStates = $this->findModels('forma\modules\selling\records\state\StateToState',
            ['state_id' => $this->oldKeys['state_id']]);

        foreach ($stateToStates as $stateToState) {
            $stateToState = $this->changeAttributes(
                $this->newKeys['state_id'],
                $stateToState,
                'state_id');

            $stateToState = $this->changeAttributes(
                $this->newKeys['state_id'],
                $stateToState,
                'to_state_id');

            $this->saveNewRecord($stateToState);
        }
        return true;
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
        if ($this->deleteAutoDamp) return $this->delete($warehouseModels);
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
        return $model::find()->where($conditions)->orderBy(['id' => SORT_ASC])->all();
    }

    public function regularity()
    {
        ['\forma\modules\core\records\Regularity',    //user_id
            '\forma\modules\core\records\Item',];      //regularity_id    parent_id

        $regularity = $this->modelWhitUser('\forma\modules\core\records\Regularity');


        $this->forSaveAndGetKey($regularity, 'regularity_id');
        if ($this->deleteAutoDamp) return $this->delete($regularity);

        $itemsModels = $this->findModels('\forma\modules\core\records\Item', ['regularity_id' => $this->oldKeys['regularity_id']]);

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
        if ($this->deleteAutoDamp) return $this->delete($fieldModels);
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
        if ($this->deleteAutoDamp) return $this->delete($productPackUnits);
        return true;
    }

    public function workerVacancy()
    {
        ['\forma\modules\worker\records\WorkerVacancy']; // worker_id   vacancy_id

        $workerVacancies = $this->findModels('forma\modules\worker\records\workervacancy\WorkerVacancy',
            ['worker_id' => $this->accessoryOldKeys['forma\modules\worker\records\Worker'],
                'vacancy_id' => $this->accessoryOldKeys['forma\modules\vacancy\records\Vacancy']]);

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

        if ($this->deleteAutoDamp) return $this->delete($workerVacancies);
        return true;
    }

    public function overheadCost()
    {

        $overheadCosts = $this->findModels('\forma\modules\overheadcost\records\OverheadCost',
            ['currency_id' => $this->accessoryOldKeys['forma\modules\product\records\Currency']]);

        foreach ($overheadCosts as $overheadCost) {
            $overheadCost = $this->changeAttributes(
                $this->accessoryNewKeys['forma\modules\product\records\Currency'],
                $overheadCost,
                'currency_id');

            $this->forSaveAndGetKey($overheadCost, 'overhead_cost_id');
        }
        if ($this->deleteAutoDamp) return $this->delete($overheadCosts);
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
        if ($this->deleteAutoDamp) return $this->delete($purchases);

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

        $purchaseProducts = $this->findModels('forma\modules\purchase\records\purchaseproduct\PurchaseProduct',
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

    public function requestStrategy()
    {

        $requestStrategeis = $this->findModels('forma\modules\selling\records\requeststrategy\RequestStrategy',
            ['strategy_id' => $this->accessoryOldKeys['forma\modules\selling\records\strategy\Strategy'],
                'request_id' => $this->accessoryOldKeys['forma\modules\selling\records\talk\Request']]);

        foreach ($requestStrategeis as $requestStrategy) {
            $requestStrategy = $this->changeAttributes(
                $this->accessoryNewKeys['forma\modules\selling\records\strategy\Strategy'],
                $requestStrategy,
                'strategy_id');

            $requestStrategy = $this->changeAttributes(
                $this->accessoryNewKeys['forma\modules\selling\records\talk\Request'],
                $requestStrategy,
                'request_id');

            $this->saveNewRecord($requestStrategy);
        }
        if ($this->deleteAutoDamp) return $this->delete($requestStrategeis);

        return true;
    }

    public function answer()////////////////++++++++++++++++++
    {

        $answers = $this->findModels('forma\modules\selling\records\talk\Answer',
            ['request_id' => $this->accessoryOldKeys['forma\modules\selling\records\talk\Request']]);

        foreach ($answers as $answer) {

            $answer = $this->changeAttributes(
                $this->accessoryNewKeys['forma\modules\selling\records\talk\Request'],
                $answer,
                'request_id');

            $this->saveNewRecord($answer);
        }

        if ($this->deleteAutoDamp) return $this->delete($answers);
        return true;
    }

    public function interview()
    {

        $interviews = $this->findModels('\forma\modules\hr\records\interview\Interview',
            ['project_id' => $this->accessoryOldKeys['forma\modules\project\records\project\Project'],
                'worker_id' => $this->accessoryOldKeys['forma\modules\worker\records\Worker'],
                'vacancy_id' => $this->accessoryOldKeys['forma\modules\vacancy\records\Vacancy']
            ]);

        foreach ($interviews as $interview) {
            $interview = $this->changeAttributes(
                $this->accessoryNewKeys['forma\modules\project\records\project\Project'],
                $interview,
                'project_id');

            $interview = $this->changeAttributes(
                $this->accessoryNewKeys['forma\modules\worker\records\Worker'],
                $interview,
                'worker_id');

            $interview = $this->changeAttributes(
                $this->accessoryNewKeys['forma\modules\vacancy\records\Vacancy'],
                $interview,
                'vacancy_id');

            $this->forSaveAndGetKey($interview, 'interview_id');

        }

        if ($this->deleteAutoDamp) return $this->delete($interviews);
        if (isset($this->oldKeys['interview_id'])) {

            $interviewVacancies = $this->findModels('forma\modules\hr\records\interviewvacancy\InterviewVacancy',
                ['vacancy_id' => $this->accessoryOldKeys['forma\modules\vacancy\records\Vacancy'],
                    'interview_id' => $this->oldKeys['interview_id'],
                    'overhead_cost_id' => $this->oldKeys['overhead_cost_id'],
                    'currency_id' => $this->accessoryOldKeys['forma\modules\product\records\Currency'],
                    'pack_unit_id' => $this->accessoryOldKeys['forma\modules\product\records\PackUnit']
                ]);


            foreach ($interviewVacancies as $interviewVacancy) {
                $interviewVacancy = $this->changeAttributes(
                    $this->accessoryNewKeys['forma\modules\vacancy\records\Vacancy'],
                    $interviewVacancy,
                    'vacancy_id');
                $interviewVacancy = $this->changeAttributes(
                    $this->accessoryNewKeys['forma\modules\product\records\Currency'],
                    $interviewVacancy,
                    'currency_id');

                $interviewVacancy = $this->changeAttributes(
                    $this->accessoryNewKeys['forma\modules\product\records\PackUnit'],
                    $interviewVacancy,
                    'pack_unit_id');

                $interviewVacancy = $this->changeAttributes(
                    $this->newKeys['overhead_cost_id'],
                    $interviewVacancy,
                    'overhead_cost_id');

                $interviewVacancy = $this->changeAttributes(
                    $this->newKeys['interview_id'],
                    $interviewVacancy,
                    'interview_id');


                $this->saveNewRecord($interviewVacancy);
            }
        }
        return true;
    }

    public function inventorization()
    {
        $inventorizations = $this->findModels('\forma\modules\inventorization\records\Inventorization',
            ['warehouse_id' => $this->oldKeys['warehouse_id']]);


        foreach ($inventorizations as $inventorization) {
            $inventorization = $this->changeAttributes(
                $this->newKeys['warehouse_id'],
                $inventorization,
                'warehouse_id');

            $this->forSaveAndGetKey($inventorization, 'inventorization_id');
        }

        if ($this->deleteAutoDamp) return $this->delete($inventorizations);
        if (isset($this->oldKeys['inventorization_id'])) {


            $inventorizationProducts = $this->findModels('\forma\modules\inventorization\records\InventorizationProduct',
                ['inventorization_id' => $this->oldKeys['inventorization_id'],
                    'product_id' => $this->accessoryOldKeys['forma\modules\product\records\Product'],
                ]);

            foreach ($inventorizationProducts as $inventorizationProduct) {
                $inventorizationProduct = $this->changeAttributes(
                    $this->newKeys['inventorization_id'],
                    $inventorizationProduct,
                    'inventorization_id');

                $inventorizationProduct = $this->changeAttributes(
                    $this->accessoryNewKeys['forma\modules\product\records\Product'],
                    $inventorizationProduct,
                    'product_id');


                $this->saveNewRecord($inventorizationProduct);
            }
        }
        return true;
    }

    public function project()
    {
//        $projectUsers = $this->findModels('forma\modules\project\records\projectuser\ProjectUser',
//            ['project_id' => $this->accessoryOldKeys['forma\modules\project\records\project\Project'],
//                'user_id' => 1]);
//
//        foreach ($projectUsers as $projectUser) {
//
//
//            $projectUser = $this->changeAttributes(
//                $this->accessoryNewKeys['forma\modules\project\records\project\Project'],
//                $projectUser,
//                'project_id');
//
//            $projectUser = $this->changeAttributes(
//                ['1' => \Yii::$app->user->identity->id],
//                $projectUser,
//                'user_id');
//
//            $this->saveNewRecord($projectUser);
//        }

        $projectVacancies = $this->findModels('forma\modules\project\records\projectvacancy\ProjectVacancy',
            ['project_id' => $this->accessoryOldKeys['forma\modules\project\records\project\Project'],
                'vacancy_id' => $this->accessoryOldKeys['forma\modules\vacancy\records\Vacancy']]);

        foreach ($projectVacancies as $projectVacancy) {
            $projectVacancy = $this->changeAttributes(
                $this->accessoryNewKeys['forma\modules\project\records\project\Project'],
                $projectVacancy,
                'project_id');

            $projectVacancy = $this->changeAttributes(
                $this->accessoryNewKeys['forma\modules\vacancy\records\Vacancy'],
                $projectVacancy,
                'vacancy_id');

            $this->saveNewRecord($projectVacancy);
        }
        if ($this->deleteAutoDamp) return $this->delete($projectVacancies);
        return true;
    }

//    public function patient()
//    {
//        $patient = $this->findModels('\forma\modules\selling\records\Patient',
//            ['project_id' => $this->accessoryOldKeys['forma\modules\project\records\project\Project'],
//                'vacancy_id' => $this->accessoryOldKeys['forma\modules\vacancy\records\Vacancy']]);
//
//        foreach ($projectUsers as $projectUser) {
//            $projectUser = $this->changeAttributes(
//                $this->accessoryNewKeys['forma\modules\project\records\project\Project'],
//                $projectUser,
//                'project_id');
//
//            $projectVacancy = $this->changeAttributes(
//                $this->accessoryNewKeys['forma\modules\vacancy\records\Vacancy'],
//                $projectVacancy,
//                'vacancy_id');
//
//            $this->saveNewRecord($projectVacancy);
//        }
//
//    }

    public function selling()
    {
        $sales = $this->findModels('forma\modules\selling\records\selling\Selling',
            ['customer_id' => $this->accessoryOldKeys['forma\modules\customer\records\Customer'],
                'warehouse_id' => $this->oldKeys['warehouse_id'],
                'state_id' => $this->oldKeys['state_id']
            ]);
//de($sales);
        foreach ($sales as $sale) {
            $sale = $this->changeAttributes(
                $this->accessoryNewKeys['forma\modules\customer\records\Customer'],
                $sale,
                'customer_id');

            $sale = $this->changeAttributes(
                $this->newKeys['warehouse_id'],
                $sale,
                'warehouse_id');

            $sale = $this->changeAttributes(
                $this->newKeys['state_id'],
                $sale,
                'state_id');

            $this->forSaveAndGetKey($sale, 'selling_id');
        }

        if ($this->deleteAutoDamp) return $this->delete($sales);

        if (isset($this->oldKeys['selling_id'])) {
            $sellingProducts = $this->findModels('forma\modules\selling\records\sellingproduct\SellingProduct',
                [
                    'product_id' => $this->accessoryOldKeys['forma\modules\product\records\Product'],
                    'currency_id' => $this->accessoryOldKeys['forma\modules\product\records\Currency'],
                    'pack_unit_id' => $this->accessoryOldKeys['forma\modules\product\records\PackUnit'],
                    'selling_id' => $this->oldKeys['selling_id'],
                    'overhead_cost_id' => $this->oldKeys['overhead_cost_id'],
                ]);
//de($sellingProducts);
            foreach ($sellingProducts as $sellingProduct) {
                $sellingProduct = $this->changeAttributes(
                    $this->accessoryNewKeys['forma\modules\product\records\Product'],
                    $sellingProduct,
                    'product_id');

                $sellingProduct = $this->changeAttributes(
                    $this->accessoryNewKeys['forma\modules\product\records\Currency'],
                    $sellingProduct,
                    'currency_id');

                $sellingProduct = $this->changeAttributes(
                    $this->accessoryNewKeys['forma\modules\product\records\PackUnit'],
                    $sellingProduct,
                    'pack_unit_id');

                $sellingProduct = $this->changeAttributes(
                    $this->newKeys['selling_id'],
                    $sellingProduct,
                    'selling_id');

                $sellingProduct = $this->changeAttributes(
                    $this->newKeys['overhead_cost_id'],
                    $sellingProduct,
                    'overhead_cost_id');

                $this->saveNewRecord($sellingProduct);
            }
        }
        return true;
    }

    public function transit()
    {
        $transits = $this->findModels('\forma\modules\transit\records\transit\Transit', [
            'from_warehouse_id' => $this->oldKeys['warehouse_id']
        ]);

        foreach ($transits as $transit) {
            $transit = $this->changeAttributes(
                $this->newKeys['warehouse_id'],
                $transit,
                'from_warehouse_id');

            $transit = $this->changeAttributes(
                $this->newKeys['warehouse_id'],
                $transit,
                'to_warehouse_id');

            $this->forSaveAndGetKey($transit, 'transit_id');
        }
        if ($this->deleteAutoDamp) return $this->delete($transits);

        if (isset($this->oldKeys['transit_id'])) {
            $transitOverheadCosts = $this->findModels('\forma\modules\transit\records\transit\TransitOverheadCost', [
                'transit_id' => $this->oldKeys['transit_id'],
                'overhead_cost_id' => $this->oldKeys['overhead_cost_id'],
            ]);
            foreach ($transitOverheadCosts as $transitOverheadCost) {
                $transitOverheadCost = $this->changeAttributes(
                    $this->newKeys['transit_id'],
                    $transitOverheadCost,
                    'transit_id');

                $transitOverheadCost = $this->changeAttributes(
                    $this->newKeys['overhead_cost_id'],
                    $transitOverheadCost,
                    'overhead_cost_id');

                $this->saveNewRecord($transitOverheadCost);
            }

            $transitProducts = $this->findModels('\forma\modules\transit\records\transitproduct\TransitProduct', [
                'transit_id' => $this->oldKeys['transit_id'],
                'overhead_cost_id' => $this->oldKeys['overhead_cost_id'],
                'pack_unit_id' => $this->accessoryOldKeys['forma\modules\product\records\PackUnit'],
                'product_id' => $this->accessoryOldKeys['forma\modules\product\records\Product']
            ]);

            foreach ($transitProducts as $transitProduct) {
                $transitProduct = $this->changeAttributes(
                    $this->newKeys['transit_id'],
                    $transitProduct,
                    'transit_id');

                $transitProduct = $this->changeAttributes(
                    $this->newKeys['overhead_cost_id'],
                    $transitProduct,
                    'overhead_cost_id');

                $transitProduct = $this->changeAttributes(
                    $this->accessoryNewKeys['forma\modules\product\records\PackUnit'],
                    $transitProduct,
                    'pack_unit_id');

                $transitProduct = $this->changeAttributes(
                    $this->accessoryNewKeys['forma\modules\product\records\Product'],
                    $transitProduct,
                    'product_id');

                $this->saveNewRecord($transitProduct);
            }

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