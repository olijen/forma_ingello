<?php

namespace forma\modules\core\widgets;

use forma\modules\core\components\StateActiveRecord;
use yii\base\Widget;

/**
 * @prop StateActiveRecord $model
 */
class StateView extends Widget
{
    public $model;
    public $id = 'state';

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        if (!$this->model || $this->model->isNewRecord) {
            return false;
        }
        return $this->render('state', [
            'model' => $this->model,
            'id' => $this->id,
        ]);
    }
}
