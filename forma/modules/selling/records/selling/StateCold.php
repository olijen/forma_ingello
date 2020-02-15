<?php

namespace forma\modules\selling\records\selling;

use forma\modules\core\components\State;

class StateCold extends State
{
    public function getName()
    {
        return 'Холод';
    }

    public function getActions()
    {
        return [
            'Заинтересован' => '/selling/state/Lead',
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
        return 'Клиент в этом состоянии не заинтересован в услугах, либо потребность не выявлена';
    }
}