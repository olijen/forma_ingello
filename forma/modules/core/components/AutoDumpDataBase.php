<?php


namespace forma\modules\core\components;


use forma\modules\core\records\Accessory;
use forma\modules\core\records\Regularity;
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
            ->andWhere(['like', 'entity_class', '%' . 'Category', false])->all();
        $accessoryKeys = [];
        foreach ($arrayModels as $model) {
            $accessoryKeys[$model->entity_class] [$model->entity_id] = $model->entity_id;
        }

        foreach ($accessoryKeys as $entityClass => $modelId) {
            $modelRout = '\\' . $entityClass;
            $models = $modelRout::findAll($modelId);

            foreach ($models as $model) {
                $key = $model->id;

                if (array_key_exists('parent_id', $model->attributes)){
                    $model = $this->changeAttributes(
                        $this->newParent,
                        $model,
                        'parent_id');
                    $newModel = $this->saveWhitParent($model);
                }else{
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
        $warehouse = $this->field();
        de($warehouse);

        de('$modelRoute');
    }

    public function modelWhitUser($modelsRoutWhitUser)
    {
        return $modelWhitUser = $modelsRoutWhitUser::find()->where(['user_id' => 1])->all(); // найдем все варехаус user
    }

    public function forSaveAndGetKey($modelsForSave)
    {
        for ($i = 0; $i < count($modelsForSave); $i++) {

            $oldKey = $modelsForSave[$i]->id;
            $newModel = $this->saveNewRecord($modelsForSave[$i]);
            $this->oldKeys[$oldKey] = $oldKey;
            $this->newKeys[$oldKey] = $newModel->id;
        }
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
            de($model->errors);
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
        $this->forSaveAndGetKey($warehouseModels);

        $warehouseProductModels = $this->findChildModels(new WarehouseProduct,
            ['warehouse_id' => $ids, 'product_id' => $this->accessoryOldKeys['forma\modules\product\records\Product']]);
        foreach ($warehouseProductModels as $warehouseProductModel) {
            $warehouseProductModel = $this->changeAttributes(
                $this->accessoryNewKeys['forma\modules\product\records\Product'],
                $warehouseProductModel,
                'product_id');

            $warehouseProductModel = $this->changeAttributes(
                $this->newKeys,
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

    public function findChildModels($model, $conditions)
    {
        return $model::find()->where($conditions)->all();
    }

    public function regularity()
    {
        ['\forma\modules\core\records\Regularity',    //user_id
            '\forma\modules\core\records\Item',];      //regularity_id    parent_id

        $modelWhitUser = $this->modelWhitUser('\forma\modules\core\records\Regularity');
        $this->forSaveAndGetKey($modelWhitUser);

        $itemsModels = $this->findChildModels('\forma\modules\core\records\Item', ['regularity_id' => $this->oldKeys]);
        foreach ($itemsModels as $itemsModel) {
            $itemsModel = $this->changeAttributes(
                $this->newKeys,
                $itemsModel,
                'regularity_id');

            $itemsModel = $this->changeAttributes(
                $this->newParent,
                $itemsModel,
                'parent_id');

            $itemsModel = $this->saveWhitParent($itemsModel);

        }

        return true;
    }

    public function field()
    {
        ['\forma\modules\product\records\Field',    //  category_id
            '\forma\modules\product\records\FieldProductValue', // field_id  product_id
            '\forma\modules\product\records\FieldValue',];  // field_id

        $fieldModels = $this->findChildModels('\forma\modules\product\records\Field',
            ['category_id' => $this->accessoryOldKeys['forma\modules\product\records\Category']]);
//        de($this->accessoryOldKeys['forma\modules\product\records\Category']);
        foreach ($fieldModels as $fieldModel) {
            $fieldModel = $this->changeAttributes(
                $this->accessoryNewKeys['forma\modules\product\records\Category'],
                $fieldModel,
                'category_id');

            $this->saveNewRecord($fieldModel);
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