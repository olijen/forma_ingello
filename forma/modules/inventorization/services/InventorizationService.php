<?php

namespace forma\modules\inventorization\services;

use forma\modules\inventorization\records\Inventorization;
use forma\modules\inventorization\records\InventorizationSearch;
use forma\modules\inventorization\records\StateConfirm;
use yii\db\Query;
use Yii;
use yii\web\ForbiddenHttpException;

class InventorizationService
{
    public static function search()
    {
        return new InventorizationSearch();
    }

    public static function create()
    {
        return new Inventorization();
    }

    public static function get($id)
    {
        if (!$id) {
            return self::create();
        }

        return Inventorization::findOne($id);
    }

    public static function delete($id)
    {
        $model = self::get($id);
        $model->delete();
        return $model;
    }

    public static function createByWarehouse($warehouseId)
    {
        $model = self::create();
        if (!$warehouseId) {
            return $model;
        }
        /** @var $warehouseModule \forma\modules\warehouse\Module */
        $warehouseModule = Yii::$app->getModule('warehouse');
        if ($warehouseModule->reviewsByInventorization($warehouseId)) {
            throw new ForbiddenHttpException;
        }

        $model->name = 'Новая инвентаризация с ' . Yii::$app->formatter->asDatetime(time(), 'php:d.m.Y H:i:s');
        $model->warehouse_id = $warehouseId;

        $model->save();
        return $model;
    }

    public static function getDateRange()
    {
        $range = (new Query())
            ->select(['MIN(date) AS min', 'MAX(date) AS max'])
            ->from(['inventorization'])
            ->one();

        $min = date('d.m.Y', strtotime($range['min']));
        $max = date('d.m.Y', strtotime($range['max']));

        return "$min - $max";
    }

    public static function getWarehousesList($id = null)
    {
        /** @var $warehouseModule \forma\modules\warehouse\Module */
        $warehouseModule = Yii::$app->getModule('warehouse');
        return $warehouseModule->getListForInventorization($id);
    }

    public static function confirm($id, $post)
    {
        $model = self::get($id);

        foreach ($post['table'] as $warehouseProductId => $row) {
            if (empty($row)) continue;
            InventorizationProductService::saveDifference($id, $warehouseProductId, $row);
        }

        $model->applyState(new StateConfirm());
        if (!$model->save()) {
            var_dump($model->getErrors());
            die;
        }

        return $model;
    }
    
    public static function save($id, $post)
    {
        $model = self::get($id);
        $model->load($post);

        if (!$model->validate()) {
            return $model;
        }
        if (!$model->save()) {
            var_dump($model->getErrors());
            die;
        }
        return $model;
    }
}
