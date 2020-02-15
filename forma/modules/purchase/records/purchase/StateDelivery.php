<?php

namespace forma\modules\purchase\records\purchase;

use forma\modules\core\components\State;

class StateDelivery extends State
{

    public function getName()
    {
        return 'Доставка';
    }

    public function getActions()
    {
        return [
            'Вернуться к оплате.' => '/purchase/state/payment',
            'Оприходовать' => '/purchase/state/confirm',
        ];
    }

    public function getDescription()
    {
        return 'Доставка.';
    }
}
