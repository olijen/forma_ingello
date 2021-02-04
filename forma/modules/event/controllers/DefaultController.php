<?php

namespace forma\modules\event\controllers;

use forma\components\Controller;

/**
 * Default controller for the `event` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
