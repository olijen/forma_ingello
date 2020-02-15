<?php

namespace forma\modules\hr\records\interview;

use forma\modules\core\components\State;

class StateMeeting extends State
{
    public function getName()
    {
        return 'Собеседование';
    }

    public function getActions()
    {
        return [
            'Заинтересован' => '/hr/state/Hot',
            'Собеседование' => '/hr/state/Meeting',
            'Оффер' => '/hr/state/Offer',
            'Работа' => '/hr/state/Work',
            'Уволен' => '/hr/state/Done',
            'Архив' => '/hr/state/Archive',
        ];
    }

    public function getDescription()
    {
        return 'На данном этапе мы договорились о встрече';
    }
}