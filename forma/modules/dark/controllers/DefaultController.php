<?php

namespace forma\modules\dark\controllers;

use forma\modules\core\components\AutoDumpDataBase;
use forma\components\Controller;

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
        $this->layout = false;
        return $this->render('index');
    }

    public function actionSql(){


        return $this->render('sql.php');
    }

    public function actionTryAutoDump() {
        $autoDump = new AutoDumpDataBase();
        $autoDump->start();
    }
}