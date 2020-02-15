<?php

namespace forma\extensions\editable;

use yii\base\Behavior;
use yii\base\Exception;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class ListBehavior extends Behavior
{
    public $relations = [];

    public $valueAttr = 'id';
    public $labelAttr = 'name';

    public $condition = [];

    public function attach($owner)
    {
        parent::attach($owner);

        if (!$this->owner instanceof ActiveRecord) {
            throw new Exception('ListBehavior owner must extend ActiveRecord');
        }
    }

    public function getList($attribute)
    {
        if (!key_exists($attribute, $this->relations)) {
            throw new Exception(get_class($this->owner) . "has no relation by $attribute attribute");
        }
        /** @var ActiveRecord $modelClass */
        $modelClass = $this->relations[$attribute];
        $selection = $modelClass::find()->all();
        return ArrayHelper::map($selection, $this->valueAttr, $this->labelAttr);
    }
}
