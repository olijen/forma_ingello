<?php

namespace forma\modules\purchase\records\purchase;

use Yii;
use forma\modules\core\components\State;
use forma\modules\warehouse\Module;

class StateDeny extends State
{

    public function getName()
    {
        return 'Возврат';
    }

    public function getActions()
    {
        return [
            'Вернуть и оприходовать' => '/purchase/state/confirm',
        ];
    }

    public function getDescription()
    {
        return 'Укажите количество товаров на возврат и напишите коментарий';
    }

    public function beforeSave(Purchase $purchase)
    {
        /** @var Module $module */
        $module = Yii::$app->getModule('warehouse');
        return $module->clearEmpty($purchase, $purchase->warehouse_id);
    }
}
