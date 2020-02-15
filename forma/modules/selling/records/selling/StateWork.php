<?php

namespace forma\modules\selling\records\selling;

use forma\modules\core\components\State;

class StateWork extends State
{
    public function getName()
    {
        return 'Работа';
    }

    public function getActions()
    {
        return [
            'Закрыт' => '/selling/state/Done',
        ];
    }

    public function getDescription()
    {
        return 'На данном этапе мы работаем над проектом';
    }
}