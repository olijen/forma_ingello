<?php

namespace forma\modules\purchase\records\purchase;

use forma\modules\core\components\State;

class StatePayment extends State
{

    public function getName()
    {
        return 'Оплата';
    }

    public function getActions()
    {
        return [
            'Вернуться к уточнению' => '/purchase/state/initial',
            'Перейти к доставке' => '/purchase/state/delivery',
        ];
    }

    public function getDescription()
    {
        return 'Оплата.';
    }
}
