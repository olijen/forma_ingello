<?php

namespace forma\modules\transit\records\transit;

use forma\modules\core\components\State;
use yii\helpers\Url;

class StateInitial extends State
{
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Уточнение товарного состава';
    }

    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        return '
            Выберите позиции.
            Когда товар будет перемещен -
            отметьте возврат или оприходуйте товар на склад.
        ';
    }

    /**
     * @inheritdoc
     */
    public function getActions()
    {
        return [
            // 'Выбрать возврат' => Url::to(['/transit/state/deny']),
            'Оприходовать' => Url::to(['/transit/state/confirm']),
        ];
    }
}
