<?php

namespace forma\modules\selling\services;

use forma\modules\selling\records\talk\Request;
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