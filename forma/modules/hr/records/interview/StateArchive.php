<?php

namespace forma\modules\hr\records\interview;

use forma\modules\core\components\State;

class StateArchive extends State
{
    public function getName()
    {
        return 'Архив';
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
        return 'Карта найма в данном состоянии закрыта и хранится в архиве';
    }
}