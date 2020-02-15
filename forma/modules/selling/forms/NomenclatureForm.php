<?php

namespace forma\modules\selling\forms;

use yii\base\Model;

class NomenclatureForm extends Model
{
    public $productId;
    public $productName;

    public $packUnitId;
    public $quantity;
    public $costType;
    public $cost;

    public function attributeLabels()
    {
        return [
            'productId' => false,
            'productName' => 'Товар',
            'packUnitId' => 'Упаковка',
            'quantity' => 'Количество',
            'costType' => 'Тип',
            'cost' => 'Стоимость',
        ];
    }
}
