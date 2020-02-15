<?php

namespace forma\modules\selling\records\selling;

use forma\modules\core\components\State;

class StateFamiliar extends State
{
    public function getName()
    {
        return 'ЛПР';
    }

    public function getActions()
    {
        return [
            'Есть поребность' => '/selling/state/Hot',
            'Обсудили всречу' => '/selling/state/Meeting',
            'Тестовые работы' => '/selling/state/TestIssue',
            'Коммерческое' => '/selling/state/Offer',
            'Оплата' => '/selling/state/Payment',
            'Работа' => '/selling/state/Work',
            'Закрыт' => '/selling/state/Done',
        ];
    }

    public function getDescription()
    {
        return 'На данном этапе мы знакомы с представителем компании, который принимает решения';
    }
}