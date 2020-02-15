<?php

namespace forma\modules\selling\records\selling;

use forma\modules\core\components\State;

class StateLead extends State
{
    public function getName()
    {
        return 'Лид';
    }

    public function getActions()
    {
        return [
            'Знакомы с ЛПР' => '/selling/state/Familiar',
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
        return 'На данном этапе мы выяснили, что в принцыпе этот клиент мог бы заказать услуги у нас';
    }
}