<?php

namespace forma\modules\transit\records\transit;

use Yii;
use forma\modules\core\components\State;
use yii\helpers\Url;
use forma\modules\warehouse\Module;

class StateConfirm extends State
{
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Оприходован';
    }

    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        return 'Этот процесс находится в архиве, его нельзя редактировать';
    }

    /**
     * @inheritdoc
     */
    public function getActions()
    {
        return [
            // 'Отменить' => Url::to(['/transit/state/rollback']),
        ];
    }

    public function beforeSave(Transit $transit)
    {
        $transit->date_complete = Yii::$app->formatter->asDatetime(time(), 'php:Y-m-d H:i:s');

        /** @var Module $module */
        $module = Yii::$app->getModule('warehouse');
        return $module->move($transit);
    }

    public function afterSave(Transit $transit)
    {
        /** @var Module $module */
        $module = Yii::$app->getModule('warehouse');
        return $module->removeEmpty($transit, $transit->fromWarehouse);
    }
}
