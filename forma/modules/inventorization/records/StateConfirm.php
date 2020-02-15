<?php

namespace forma\modules\inventorization\records;

use forma\modules\core\components\State;
use Yii;

class StateConfirm extends State
{
    public function getName()
    {
        return 'Операция завершена';
    }

    public function getDescription()
    {
        return 'Вы не можете изменять данные';
    }

    public function getActions()
    {
        return [];
    }

    public function beforeSave(Inventorization $model)
    {
        $model->date = Yii::$app->formatter->asDatetime(time(), 'php:Y-m-d H:i:s');
        return true;
    }

    public function afterSave(Inventorization $model)
    {
        /** @var $warehouseModule \forma\modules\warehouse\Module */
        $warehouseModule = Yii::$app->getModule('warehouse');
        return $warehouseModule->recalculate($model);
    }
}
