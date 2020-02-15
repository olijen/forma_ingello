<?php

namespace forma\modules\hr\services;

use forma\modules\hr\records\talk\Request;
use yii\helpers\ArrayHelper;

class RequestService
{

    public static  function getRequest()
    {
        return new Request();
    }

    public static function getList()
    {
        return ArrayHelper::map(Request::find()->all(), 'id', 'text');
    }

    public static function getRequests($id)
    {

    }

}