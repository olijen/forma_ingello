<?php

namespace forma\modules\transit\records\transit;

use Yii;
use forma\modules\core\components\State;
use yii\helpers\Url;
use forma\modules\warehouse\Module;

class StateDeny extends State
{
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Возврат';
    }

    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        return 'Укажите количество товаров на возврат и напишите коментарий';
    }

    /**
     * @inheritdoc
     */
    public function getActions()
    {
        return [
            'Вернуть и оприходовать' => Url::to(['/transit/state/confirm']),
        ];
    }

    public function beforeSave(Transit $transit)
    {
        /** @var Module $module */
        $module = Yii::$app->getModule('warehouse');
        return $module->clearEmpty($transit, $transit->to_warehouse_id);
    }
}
