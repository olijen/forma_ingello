<?php

namespace forma\modules\selling\controllers;

use forma\modules\selling\forms\SalesProgress;
use yii\web\Controller;

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
}
