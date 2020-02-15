<?php

namespace forma\modules\selling\records\selling;

use forma\modules\core\components\State;

class StateMeeting extends State
{
    public function getName()
    {
        return 'Встреча';
    }

    public function getActions()
    {
        return [
            'Тестовые работы' => '/selling/state/TestIssue',
            'Коммерческое' => '/selling/state/Offer',
            'Оплата' => '/selling/state/Payment',
            'Работа' => '/selling/state/Work',
            'Закрыт' => '/selling/state/Done',
        ];
    }

    public function getDescription()
    {
        return 'На данном этапе мы договорились о встрече';
    }
}