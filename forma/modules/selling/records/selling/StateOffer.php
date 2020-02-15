<?php

namespace forma\modules\selling\records\selling;

use forma\modules\core\components\State;

class StateOffer extends State
{
    public function getName()
    {
        return 'Коммерческое';
    }

    public function getActions()
    {
        return [
            'Оплата' => '/selling/state/Payment',
            'Работа' => '/selling/state/Work',
            'Закрыт' => '/selling/state/Done',
        ];
    }

    public function getDescription()
    {
        return 'На данном этапе мы обсуждаем реальный объём работ и цену';
    }
}