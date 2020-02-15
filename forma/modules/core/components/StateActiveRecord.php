<?php

namespace forma\modules\core\components;

use forma\components\AccessoryActiveRecord;
use Exception;
use yii\db\ActiveRecord;

abstract class StateActiveRecord extends AccessoryActiveRecord
{
    /** @var  State */
    protected $_state;
    protected $_states = [];

    abstract public function states();
    /*
        return [
            0 => StateInitial::class,
            1 => StateOne::class,
            2 => StateTwo::class,
        ]
    */

    /**
     * @return State[]
     */
    public function getStates()
    {
        if (!$this->_states) {
            foreach ($this->states() as $id => $stateClass) {
                $this->_states[$id] = new $stateClass();
            }
        }
        return $this->_states;
    }

    /**
     * @return State
     */
    public function getState()
    {
        if ($this->isNewRecord) {
            $this->_state = $this->getStates()[0];
        }
        return $this->_state;
    }

    public function stateIs($stringState) {
        $state = null;
        if (!($stringState instanceof State)) {
            $state = new $stringState;
        } else {
            $state = $stringState;
        }
        return (get_class($state) == get_class($this->getState()));
    }

    public function getStateById($id)
    {
        //todo: Однажды попалось состояние null
        $id = $id * 1;

        return $this->getStates()[$id];
    }

    public function applyState(State $type)
    {
        //Находим состояние задонного типа - сравнивая классы
        foreach ($this->getStates() as $state) {
            if (get_class($type) == get_class($state)) {
                $newState = $state;
            }
        }

        if (!isset($newState)) {
            throw new Exception('State is innnnnnnn');
        }
        $this->getState()->isActive = false;
        $newState->isActive = true;
        $this->_state = $newState;
    }

    public function afterFind()
    {
        parent::afterFind();
        $this->_state = $this->getStateById($this->getAttribute('state'));
        $this->_state->isActive = true;
    }

    public function beforeSave($insert)
    {
        $state = $this->getState();
        if (method_exists($state, 'beforeSave')) {
            if (!$state->beforeSave($this)) {
                return false;
            }
        }

        foreach ($this->getStates() as $n => $s) {
            if (get_class($state) === get_class($s)) {
                $stateConst = $n;
            }
        }

        if (!isset($stateConst)) {
            throw new Exception('State is unregistered');
        }

        $this->state = $stateConst;
        return parent::beforeSave($insert);
    }

    public function afterSave($insert, $changedAttributes)
    {
        $state = $this->getState();
        if (method_exists($state, 'afterSave')) {
            if (!$state->afterSave($this)) {
                return false;
            }
        }

        return parent::afterSave($insert, $changedAttributes);
    }

    public static function getStatesList()
    {
        $model = new static();
        $list = [];
        foreach ($model->getStates() as $id => $state) {
            /** @var StateActiveRecord $state */
            $list[$id] = $state->getName();
        }
        return $list;
    }
}
