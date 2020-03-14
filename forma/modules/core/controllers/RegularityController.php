<?php

namespace forma\modules\core\controllers;


use yii\web\Controller;
use yii\filters\AccessControl;

class RegularityController extends Controller{

    public function actionIndex(){

        return $this->render('index');

    }
}