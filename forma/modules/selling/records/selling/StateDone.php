<?php

namespace forma\modules\selling\records\selling;

use forma\modules\core\components\State;

class StateDone extends State
{
    public function getName()
    {
        return 'Закрыт';
    }

    public function getActions()
    {
        return [
            
        ];
    }

    public function getDescription()
    {
        return 'Продажа в данном состоянии закрыта и хранится в архиве';
    }
}