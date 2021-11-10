<?php

namespace forma\modules\selling\controllers;

use forma\components\Controller;

class InstagramController extends Controller
{

    /**
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
