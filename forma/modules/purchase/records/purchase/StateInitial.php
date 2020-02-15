<?php

namespace forma\modules\purchase\records\purchase;

use forma\modules\core\components\State;

class StateInitial extends State
{

    public function getName()
    {
        return 'Уточнение товарного состава';
    }

    public function getActions()
    {
        return [
            'Перейти к оплате' => '/purchase/state/payment',
        ];
    }

    public function getDescription()
    {
        return 'Выберите позиции и укажите цены. Кгда товар будет доставлен и проверен - отметьте возврат или оприходуйте товар на склад.';
    }
}
