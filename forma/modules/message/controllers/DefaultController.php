<?php

namespace forma\modules\messages\controllers;

use forma\components\Controller;

/**
 * Default controller for the `messages` module
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
