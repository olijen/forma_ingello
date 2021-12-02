<?php

namespace forma\modules\selling\controllers;

use forma\modules\selling\forms\SalesProgress;
use forma\components\Controller;

/**
 * Default controller for the `selling` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $salesProgress = new SalesProgress();

        return $this->render('index',compact(
            'salesProgress'
        ));
    }
    public function actionHistory()
    {
        $salesProgress = new SalesProgress();

        return $this->render('diagramma',compact(
            'salesProgress'
        ));
    }
}
