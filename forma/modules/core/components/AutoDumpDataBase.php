<?php


namespace forma\modules\core\components;


use forma\modules\core\records\Accessory;
use forma\modules\warehouse\records\Warehouse;
use forma\modules\warehouse\records\WarehouseProduct;

class AutoDumpDataBase
{
    public $accessoryKeys;

    public function getAccessoryKeys()
    {
        $model = new Accessory();

        $arrayModels = $model::find()->where(['user_id' => 1])
            ->andWhere(['like', 'entity_class', '%' . 'Product', false])->all();
        $accessoryKeys = [];
        foreach ($arrayModels as $model) {
            $accessoryKeys[$model->entity_class] [$model->entity_id] = $model->entity_id;
        }

        foreach ($accessoryKeys as $entityClass => $modelId) {
            $modelRout = '\\' . $entityClass;
            $models = $modelRout::findAll($modelId);

            foreach ($models as $model) {
                $key = $model->id;
                $newModel = $this->saveNewRecord($model);

                $accessoryKeys[$entityClass][$key] = $newModel->id;
            }
        }

        return $this->accessoryKeys = $accessoryKeys;
    }

    public function saveNewRecord($model)
    {
        $model->isNewRecord = true;
        $model->id = null;

        if (!$model->save()) {
            de($model->errors);
        }
        return $model;
    }

    public function modelWhitUser($modelsRoutWhitUser)
    {
        $modelWhitUser = $modelsRoutWhitUser::find()->where(['user_id' => 1])->all(); // найдем все варехаус user
        $ids = [];
        foreach ($modelWhitUser as $model) {
            $ids [] = $model->warehouse_id;
        }
        return $ids;
    }

    public function start()
    {        //(user_id=1 and entity_class like '%Product') or (user_id=112 and entity_class like '%Product')
        $this->getAccessoryKeys();

        $modelsRoute = [
            '\forma\modules\warehouse\records\WarehouseUser',
            ['\forma\modules\warehouse\records\Warehouse',
                '\forma\modules\warehouse\records\WarehouseProduct',]];

        foreach ($modelsRoute as $modelsRoutWhitUser) {
            $ids = $this->modelWhitUser($modelsRoutWhitUser);
            $this->dsa($ids);
        }
        de('$modelRoute');
    }

    public function dsa($ids)
    {
        $warehouseModels = Warehouse::findAll($ids);

        for ($i = 0; $i < count($warehouseModels); $i++) {
            // сохранение варехаус
//                $this->saveNewRecord($warehouseModels[$i]);
//                de($warehouseUsers[$i]);
            // сохранение варехоус user
//                $this->saveNewRecord($warehouseUsers[$i]);
        }

        $warehouseProductModels = WarehouseProduct::find()
            ->where(['warehouse_id' => $ids, 'product_id' => ['102', '103', '107']])->all();
        foreach ($warehouseProductModels as $warehouseProductModel) {
            foreach ($this->accessoryKeys['forma\modules\product\records\Product'] as $key => $newKey) {
                if ($warehouseProductModel->product_id == $key) {
                    $warehouseProductModel->product_id = $newKey;
                }
            }
//               $newModels[]= $this->saveNewRecord($warehouseProductModel);// сохранение без юзера
        }
    }

    public function warehouse()
    {
        $modelsRoute = [
            '\forma\modules\warehouse\records\WarehouseUser',
            ['\forma\modules\warehouse\records\Warehouse',
                '\forma\modules\warehouse\records\WarehouseProduct',],
        ];
    }

}