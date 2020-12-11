<?php

namespace forma\modules\dark\controllers;

use yii\web\Controller;

/**
 * Default controller for the `customer` module
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

    public function actionSql(){


        return $this->render('sql.php');
    }
}