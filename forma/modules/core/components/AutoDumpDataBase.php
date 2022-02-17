<?php


namespace forma\modules\core\components;


use forma\modules\core\records\Accessory;
use forma\modules\core\records\Regularity;
use forma\modules\core\records\SystemEvent;
use forma\modules\event\records\Event;
use forma\modules\hr\records\interview\Interview;
use forma\modules\hr\records\interviewstate\InterviewState;
use forma\modules\product\records\Field;
use forma\modules\product\records\ProductPackUnit;
use forma\modules\warehouse\records\Warehouse;
use forma\modules\warehouse\records\WarehouseProduct;
use Yii;

class AutoDumpDataBase
{
    public $accessoryOldKeys;
    public $accessoryNewKeys;
    public $oldKeys = [];
    public $newKeys = [];
    public $newParent = [];
    public $oldParent = [];
    protected $deleteAutoDamp = false;

    //возвращаем id продуктов из accessory
    public function getOldAccessory($entityClass)
    {
        $arrayModels = Accessory::find()->where(['user_id' => 1])
            ->andWhere(['entity_class' => $entityClass])
            ->all();

        $keyModel = [];
        foreach ($arrayModels as $model) {
            $keyModel[] = $model->entity_id;
        }

        return $keyModel;
    }

    /**
     * Метод принимает строку в формате ('Y-m-d'), и меняет месяц и год на текущие
     * @param $oldDate
     * @return false|string
     */
    public function getNewDateFromEventDate($oldDate)
    {
        $d = date('d', strtotime($oldDate));
        $currentMonth = date('m', strtotime(date('Y-m-d')));
        $currentYear = date('Y', strtotime(date('Y-m-d')));

        if ($d == 29 || $d == 30 || $d == 31) {
            $d = 28;
        }

        $newDateEvent = $currentYear . '-' . $currentMonth . '-' . $d;

        return date('Y-m-d', strtotime($newDateEvent));
    }

    //Перебираем в этом методе все записи в accessory, которые обозначены условием,
    // далее формируем по записям accessory с помощью атрибута entity_class новую модель и сохраняем ее
    // как реакция на это, модель наследуемая от accessory создает новый access  с новым user_id
    public function getAccessoryKeys()
    {
        $model = new Accessory();

        //Странно в Accessory нет Country, но указывается в запросе
        $arrayModels = $model::find()->where(['user_id' => 1])
            ->andWhere(['not in', 'entity_class',
                [
                    'forma\\modules\\selling\\records\\talk\\Answer',
                    'forma\\modules\\selling\\records\\sellingproduct\\SellingProduct',
                    'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',
                    'forma\\modules\\hr\\records\\interview\\Interview',
                    'forma\\modules\\selling\\records\\selling\\Selling',
                    'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',
                    'forma\\modules\\country\\records\\Country', 'forma\\modules\\product\\records\\Product',
                    'forma\\modules\\inventorization\\records\\Inventorization', 'forma\\modules\\transit\\records\\transit\\Transit',
                    'forma\\modules\\purchase\\records\\purchase\\Purchase',
                    'forma\\modules\\purchase\\records\\purchase\\PurchaseProduct',
                    'forma\\modules\\core\\records\\Rule',
                    'forma\\modules\\test\\records\\Test',
                    'forma\\modules\\test\\records\\TestType',
                    'forma\\modules\\test\\records\\TestTypeField'
                ]
            ])->all();

        $accessoryKeys = [];
        foreach ($arrayModels as $model) {
            $accessoryKeys[$model->entity_class] [$model->entity_id] = $model->entity_id;
        }
        // \Yii::debug($accessoryKeys);

        foreach ($accessoryKeys as $entityClass => $modelId) {
            //создаем модели для всех выбранных из accessory, подставляем класс и из него кидаем запрос на save
            $modelRout = '\\' . $entityClass;
            $models = $modelRout::find()->where(['id' => $modelId])->orderBy(['id' => SORT_ASC])->all();
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
                        if ($entityClass === Event::className()) {
                            $oldDateFrom = $model->date_from;
                            $oldDateTo = $model->date_to;
                            $model->date_from = $this->getNewDateFromEventDate($oldDateFrom);
                            $model->date_to = $this->getNewDateFromEventDate($oldDateTo);
                        }
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

    public function systemEvents()
    {
        $dateTime = [];
        for ($i = 0; $i < 5; $i++) {
            $date = new \DateTime();
            $stringPD = 'P' . $i . 'D';
            $date->add(new \DateInterval($stringPD));
            $dateTime [] = $date->format('Y-m-d');
        }
        $application = [
            'HRM',
            'CRM',
            'ERP',
            'HRM',
            'ERP',
        ];
        $module = [
            'Найм',
            'Продажа',
            'Склад',
            'Проект',
            'Продукт',
        ];
        $data = [
            'Работник Удален: "Алина" пользователем admin',
            'Продажа Удален: "Продажа Lenovo Tab 2" пользователем admin',
            'Склад Удален: "Склад в Днепре" пользователем admin',
            'Вакансия Удален: "Менеджер по продажам" пользователем admin',
            'Категория Удален: "Игровые ПК" пользователем admin',
        ];
        $className = [
            'Worker',
            'Selling',
            'Warehouse',
            'Vacancy',
            'Category',
        ];
        $requestUri = [
            '/worker/worker/delete?id=51',
            '/selling/main/delete?id=2',
            '/warehouse/warehouse/delete?id=102',
            '/vacancy/vacancy/delete?id=90',
            '/product/category/delete?id=194',
        ];
        $senderId = [
            51,
            2,
            102,
            90,
            194,
        ];

        for ($i = 0; $i < count($application); $i++) {
            $systemEvent = new SystemEvent();
            $systemEvent->date_time = $dateTime[$i];
            $systemEvent->application = $application[$i];
            $systemEvent->module = $module[$i];
            $systemEvent->data = $data[$i];
            $systemEvent->user_id = Yii::$app->user->identity->id;
            $systemEvent->class_name = $className[$i];
            $systemEvent->request_uri = $requestUri[$i];
            $systemEvent->sender_id = $senderId[$i];

            $systemEvent->save();
        }
    }

    public function start()
    {
        $this->getAccessoryKeys();
        $this->workerVacancy();
        $this->state();
        $this->interviewState();
        $this->product();
        $this->warehouse();
        $this->regularity();

        //product

        $this->field();
        $this->productPackUnit();
        $this->overheadCost();
        $this->purchase();
        $this->requestStrategy();
        $this->answer();
        $this->interview();
        $this->inventorization();
        $this->project();
        $this->selling();
        $this->transit();
        $this->userWidget();
        $this->systemEvents();
        $this->test();

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

    public function userWidget()
    {
        $widgetUsers = $this->findModels('forma\modules\core\records\WidgetUser', ['user_id' => 1]);

        foreach ($widgetUsers as $widget) {
            $widget = $this->changeAttributes(
                ['1' => \Yii::$app->user->identity->id],
                $widget,
                'user_id');

            $this->forSaveAndGetKey($widget, 'widgetUser_id');
        }

        if ($this->deleteAutoDamp) return $this->delete($widgetUsers);

        return true;
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

    public function interviewState()
    {
        $states = $this->findModels('forma\modules\hr\records\interviewstate\InterviewState', ['user_id' => 1]);

        foreach ($states as $state) {
            $state = $this->changeAttributes(
                ['1' => \Yii::$app->user->identity->id],
                $state,
                'user_id');

            $this->forSaveAndGetKey($state, 'interviewState_id');
        }

        if ($this->deleteAutoDamp) return $this->delete($states);

        return true;
    }

    public function warehouse()
    {
        $modelWhitUser = $this->modelWhitUser('\forma\modules\warehouse\records\WarehouseUser');
        $ids = $this->getIdsForModelAttributes($modelWhitUser, 'warehouse_id');

        $warehouseModels = Warehouse::findAll($ids);


        $this->forSaveAndGetKey($warehouseModels, 'warehouse_id');
        if ($this->deleteAutoDamp) return $this->delete($warehouseModels);
        $warehouseProductModels = $this->findModels(new WarehouseProduct,
            ['warehouse_id' => $ids, 'product_id' => $this->getOldAccessory('forma\\modules\\product\\records\\Product')]);
        foreach ($warehouseProductModels as $warehouseProductModel) {
            $warehouseProductModel = $this->changeAttributes(
                $this->newKeys['product_id'],
                $warehouseProductModel,
                'product_id');

            $warehouseProductModel = $this->changeAttributes(
                $this->newKeys['warehouse_id'],
                $warehouseProductModel,
                'warehouse_id');

            $warehouseProductModel = $this->changeAttributes(
                $this->accessoryNewKeys['forma\modules\product\records\Currency'],
                $warehouseProductModel,
                'currency_id');

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
        $parentItem = $this->newParent;
        $ruleModels = $this->findModels('\forma\modules\core\records\Rule', ['id' => $this->getOldAccessory('forma\\modules\\core\\records\\Rule')]);
        foreach ($ruleModels as $ruleModel) {
            $ruleModel->item_id = $parentItem[$ruleModel->item_id];
            $this->saveWhitParent($ruleModel);
        }

        return true;
    }


    //работа с группой Field, FieldValue, FieldProductValue
    public function field()
    {
        ['\forma\modules\product\records\Field',    //  category_id
            '\forma\modules\product\records\FieldProductValue', // field_id  product_id
            '\forma\modules\product\records\FieldValue',];  // field_id

        //находим все field по старым категориям от админа
        $fieldModels = $this->findModels('\forma\modules\product\records\Field',
            ['category_id' => $this->accessoryOldKeys['forma\modules\product\records\Category']]);

        //перебираем их в цикле и меняем значения у атрибута категории на новое
        foreach ($fieldModels as $fieldModel) {
            $fieldModel = $this->changeAttributes(
                $this->accessoryNewKeys['forma\modules\product\records\Category'],
                $fieldModel,
                'category_id');

            //сохраняем id новой модели под ключ старой модели
            $this->forSaveAndGetKey($fieldModel, 'field_id');
        }
        if ($this->deleteAutoDamp) return $this->delete($fieldModels);


        //проверяем, что от админа пришли какие то field которые перешли новому пользователю, и перебирая их
        //создаем модели FieldValue, которые ссылаются на Field
        if (isset($this->oldKeys['field_id'])) {
            //выбираем все модели от админа со старым ключом Field, получаем FieldValue
            $fieldValues = $this->findModels('forma\modules\product\records\FieldValue',
                [
                    'field_id' => $this->oldKeys['field_id'],
                ]);

            //перебираем полученные FieldValue меняем их страрые field_id на новые и сохраняем.
            foreach ($fieldValues as $fieldValue) {
                $fieldValue = $this->changeAttributes(
                    $this->newKeys['field_id'],
                    $fieldValue,
                    'field_id');

                $this->forSaveAndGetKey($fieldValue, 'field_value');
            }


            Yii::debug($this->oldKeys['field_value']);
            Yii::debug($this->newKeys['field_value']);
            $fieldProductValues = $this->findModels('forma\modules\product\records\FieldProductValue',
                [
                    'field_id' => $this->oldKeys['field_id'],
                ]);

            Yii::debug($this->newKeys['field_id']);

            foreach ($this->findModels('\forma\modules\product\records\Field',
                ['id' => $this->newKeys['field_id']]) as $field) {
                Yii::debug($field);
            }
            foreach ($fieldProductValues as $fieldProductValue) {
                $fieldProductValue = $this->changeAttributes(
                    $this->newKeys['product_id'],
                    $fieldProductValue,
                    'product_id');

                $fieldProductValue = $this->changeAttributes(
                    $this->newKeys['field_id'],
                    $fieldProductValue,
                    'field_id');

                $oneValueId = ['widgetDropDownList'];
                $multiValueId = ['widgetMultiSelect'];

                if (in_array(Field::findOne($fieldProductValue->field_id)->widget, $oneValueId)) {
                    $fieldProductValue = $this->changeAttributes(
                        $this->newKeys['field_value'],
                        $fieldProductValue,
                        'value');
                }

                if (in_array(Field::findOne($fieldProductValue->field_id)->widget, $multiValueId)) {

                    $valueStr = $fieldProductValue->value;
                    Yii::debug($valueStr);
                    Yii::debug(json_decode($valueStr));
                    $valueArr = json_decode($valueStr);
                    $finalValue = '[';
                    for ($i = 0; $i < count($valueArr); $i++) {
                        if ($i == count($valueArr) - 1) {
                            $finalValue .= '"' . $this->newKeys['field_value'][$valueArr[$i]] . '"';
                        } else {
                            $finalValue .= '"' . $this->newKeys['field_value'][$valueArr[$i]] . '",';
                        }
                    }
                    $finalValue .= ']';
                    $fieldProductValue->value = $finalValue;

                }

                $this->saveNewRecord($fieldProductValue);
            }
        }
        return true;
    }

    public function productPackUnit()
    {
        ['\forma\modules\product\records\ProductPackUnit',];

        $productPackUnits = $this->findModels(new ProductPackUnit(),
            ['pack_unit_id' => $this->accessoryOldKeys['forma\modules\product\records\PackUnit'],
                'product_id' => $this->getOldAccessory('forma\\modules\\product\\records\\Product')]);

        foreach ($productPackUnits as $productPackUnit) {
            $productPackUnit = $this->changeAttributes(
                $this->accessoryNewKeys['forma\modules\product\records\PackUnit'],
                $productPackUnit,
                'pack_unit_id');

            $productPackUnit = $this->changeAttributes(
                $this->newKeys['product_id'],
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
        $purchases = $this->findModels('forma\modules\purchase\records\purchase\Purchase',
            ['id' => $this->getOldAccessory('forma\\modules\\purchase\\records\\purchase\\Purchase')]);

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
            ['id' => $this->getOldAccessory('forma\\modules\\purchase\\records\\purchaseproduct\\PurchaseProduct')]);

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
                $this->newKeys['product_id'],
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

    public function answer()
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
                'vacancy_id' => $this->accessoryOldKeys['forma\modules\vacancy\records\Vacancy'],
                'state_id' => $this->oldKeys['interviewState_id']
            ]);
        Yii::debug($interviews);

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

            $interview = $this->changeAttributes(
                $this->newKeys['interviewState_id'],
                $interview,
                'state_id');

            $this->forSaveAndGetKey($interview, 'interview_id');

        }

        if ($this->deleteAutoDamp) return $this->delete($interviews);

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
                    'product_id' => $this->getOldAccessory('forma\\modules\\product\\records\\Product'),
                ]);

            foreach ($inventorizationProducts as $inventorizationProduct) {
                $inventorizationProduct = $this->changeAttributes(
                    $this->newKeys['inventorization_id'],
                    $inventorizationProduct,
                    'inventorization_id');

                $inventorizationProduct = $this->changeAttributes(
                    $this->newKeys['product_id'],
                    $inventorizationProduct,
                    'product_id');


                $this->saveNewRecord($inventorizationProduct);
            }
        }
        return true;
    }

    public function project()
    {
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

    public function product()
    {
        $products = $this->findModels('forma\modules\product\records\Product',
            ['id' => $this->getOldAccessory('forma\\modules\\product\\records\\Product')]);

        foreach ($products as $product) {
            $product = $this->changeAttributes(
                $this->accessoryNewKeys['forma\modules\product\records\Type'],
                $product,
                'type_id'
            );

            $product = $this->changeAttributes(
                $this->accessoryNewKeys['forma\modules\product\records\Category'],
                $product,
                'category_id'
            );

            $product = $this->changeAttributes(
                $this->accessoryNewKeys['forma\modules\product\records\Manufacturer'],
                $product,
                'manufacturer_id'
            );

            $this->forSaveAndGetKey($product, 'product_id');

        }

        return true;
    }


    public function selling()
    {
        $sales = $this->findModels('forma\modules\selling\records\selling\Selling', ['id' => $this->getOldAccessory('forma\\modules\\selling\\records\\selling\\Selling')]);
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

            $sale->selling_token = Yii::$app->getSecurity()->generateRandomString();

            $this->forSaveAndGetKey($sale, 'selling_id');
        }

        if ($this->deleteAutoDamp) {
            return $this->delete($sales);
        }

        if (isset($this->oldKeys['selling_id'])) {
            $sellingProducts = $this->findModels('forma\modules\selling\records\sellingproduct\SellingProduct',
                [
                    'product_id' => $this->getOldAccessory('forma\\modules\\product\\records\\Product'),
                    'selling_id' => $this->oldKeys['selling_id'],
                ]);

            foreach ($sellingProducts as $sellingProduct) {
                $sellingProduct = $this->changeAttributes(
                    $this->newKeys['product_id'],
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
                'product_id' => $this->getOldAccessory('forma\\modules\\product\\records\\Product')
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
                    $this->newKeys['product_id'],
                    $transitProduct,
                    'product_id');

                $this->saveNewRecord($transitProduct);
            }

        }
        return true;
    }

    public function test()
    {
        $userId = Yii::$app->user->identity->id;

        $testTypes = $this->findModels('forma\modules\test\records\TestType',
            ['id' => $this->getOldAccessory('forma\\modules\\test\\records\\TestType')]);
        foreach ($testTypes as $testType) {
            $oldId = $testType->id;
            $testType->user_id = $userId;



            $this->saveNewRecord($testType);
            $this->accessoryOldKeys['forma\modules\test\records\TestType'][$oldId] = $oldId;
            $this->accessoryNewKeys['forma\modules\test\records\TestType'][$oldId] = $testType->id;
        }

        $tests = $this->findModels('forma\modules\test\records\Test',
            ['id' => $this->getOldAccessory('forma\\modules\\test\\records\\Test')]);
        foreach ($tests as $test) {
            $test = $this->changeAttributes(
                $this->accessoryNewKeys['forma\modules\test\records\TestType'],
                $test,
                'test_type_id'
            );

            $test = $this->changeAttributes(
                $this->accessoryNewKeys['forma\modules\customer\records\Customer'],
                $test,
                'customer_id'
            );

            $this->saveNewRecord($test);
        }

        $testTypeFields = $this->findModels('forma\modules\test\records\TestTypeField',
            ['id' => $this->getOldAccessory('forma\\modules\\test\\records\\TestTypeField')]);
        foreach ($testTypeFields as $testTypeField) {
            $testTypeField = $this->changeAttributes(
                $this->accessoryNewKeys['forma\modules\test\records\TestType'],
                $testTypeField,
                'test_id'
            );

            $this->saveNewRecord($testTypeField);
        }

        if ($this->deleteAutoDamp) return $this->delete($testTypeFields);
        if ($this->deleteAutoDamp) return $this->delete($tests);
        if ($this->deleteAutoDamp) return $this->delete($testTypes);

        return true;
    }
}