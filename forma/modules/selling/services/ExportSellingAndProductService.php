<?php

namespace forma\modules\selling\services;

use forma\modules\selling\records\selling\Selling;
use yii\data\ActiveDataProvider;

/**
 * @return Selling $selling
 */
class ExportSellingAndProductService
{
    public static function ExportSellingAndProductService()
    {
        $selling = Selling::find()->joinWith(['accessory'])
            ->joinWith(['warehouse', 'warehouse.warehouseUsers', 'customer', 'toState'], false, 'LEFT JOIN')
            ->joinWith(['sellingProducts' => function ($q) {
                $q->joinWith('product');
            }])
            ->where(['warehouse_user.user_id' => \Yii::$app->user->id])
            ->orWhere(['warehouse_user.user_id' => null])
            ->andWhere(['accessory.entity_class' => Selling::className()])
            ->andWhere(['in', 'accessory.user_id', \Yii::$app->user->id])
            ->select(['selling.id', 'customer.name as customerName', 'customer.chief_phone as customerPhone'
                , 'warehouse.name as warehouseName', 'state.name as stateName', 'product.name as productName',
                'selling_product.cost as cost', 'selling_product.quantity as quantity',
                '(selling_product.cost*selling_product.quantity) as sum'])->asArray();
        return $selling;
    }

    public function getProvider()
    {
        $service = self::ExportSellingAndProductService();
        $exportSellingProvider = new ActiveDataProvider([
            'query' => $service,
        ]);
        return $exportSellingProvider;
    }

    public function getSellingColumn()
    {
        $gridColumnsExport = [
            [
                'label' => 'Код продажи',
                'value' => 'id',
            ],
            [
                'label' => 'Клиент',
                'value' => 'customerName',
            ],
            [
                'label' => 'Номер',
                'value' => 'customerPhone',
            ],
            [
                'label' => 'Место',
                'value' => 'warehouseName',
            ],
            [
                'label' => 'Состояние',
                'value' => 'stateName',
            ],
            [
                'label' => 'Название товара',
                'value' => 'productName',
            ],
            [
                'label' => 'Цена продажи за 1 шт.',
                'value' => 'cost',
            ],
            [
                'label' => 'Количество',
                'value' => 'quantity',
            ],
            [
                'label' => 'Сумма',
                'value' => 'sum',
            ],

        ];
        return $gridColumnsExport;
    }
}
