<?php

namespace forma\modules\vacancy\controllers;

use forma\components\Controller;

/**
 * Default controller for the `vacancy` module
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
