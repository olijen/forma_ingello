<?php

namespace forma\modules\hr\records\interview;

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
        return 'Кандидат в этом состоянии не заинтересован в вакансии, либо потребность не выявлена';
    }
}