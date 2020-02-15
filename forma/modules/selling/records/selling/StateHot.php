<?php

namespace forma\modules\selling\records\selling;

use forma\modules\core\components\State;

class StateHot extends State
{
    public function getName()
    {
        return 'Горячий';
    }

    public function getActions()
    {
        return [
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
        return 'На данном этапе клиент очень заинтересован в услугах';
    }
}