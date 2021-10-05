<?php

namespace forma\modules\purchase\records\purchase;

use forma\modules\core\components\State;
use forma\modules\warehouse\Module;
use Yii;

class StateConfirm extends State
{

    public function getName()
    {
        return 'Оприходован';
    }

    public function getActions()
    {
        return [
            // 'Отменить' => '/purchase/state/rollback',
        ];
    }

    public function getDescription()
    {
        return 'Этот процесс находится в архиве, его нельзя редактировать';
    }

    public function beforeSave(Purchase $purchase)
    {
        $purchase->date_complete = Yii::$app->formatter->asDatetime(time(), 'php:Y-m-d H:i:s');

        /** @var Module $module */
        $module = Yii::$app->getModule('warehouse');
        return $module->acceptance($purchase);
    }
}
