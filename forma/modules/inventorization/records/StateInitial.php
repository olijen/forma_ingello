<?php

namespace forma\modules\inventorization\records;

use forma\modules\core\components\State;
use yii\helpers\Url;

class StateInitial extends State
{
    public function getName()
    {
        return 'Уточнение товарного состава';
    }

    public function getDescription()
    {
        return 'На данном этапе вы можете сверить и отметить разницу между фактическими данными и данными учета';
    }

    public function getActions()
    {
        return [
            'Провести' => Url::to(['/inventorization/state/confirm']),
        ];
    }
}
