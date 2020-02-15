<?php

namespace forma\modules\selling\records\selling;

use forma\modules\core\components\State;

class StateTestIssue extends State
{
    public function getName()
    {
        return 'Тестовые работы';
    }

    public function getActions()
    {
        return [
            'Коммерческое' => '/selling/state/Offer',
            'Оплата' => '/selling/state/Payment',
            'Работа' => '/selling/state/Work',
            'Закрыт' => '/selling/state/Done',
        ];
    }

    public function getDescription()
    {
        return 'На данном этапе мы выполняем небольшой объём работ для настройки доверя к нам';
    }
}