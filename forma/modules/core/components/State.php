<?php

namespace forma\modules\core\components;

abstract class State
{
    public $isActive = false;
    
    abstract public function getName();

    abstract public function getActions();

    public function getDescription()
    {
        return '';
    }

    public function getIsActive()
    {
        return $this->isActive;
    }
}
