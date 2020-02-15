<?php

namespace forma\modules\selling\records\selling;

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
            'Работа' => '/selling/state/Work',
            'Закрыт' => '/selling/state/Done',
        ];
    }

    public function getDescription()
    {
        return 'На данном этапе мы уже обсудили объём работ и оплату. Ждём предоплаты';
    }
}