<?php
namespace forma\modules\test\controllers;

use yii\web\Controller;

class TestController extends Controller{


    public function actionIndex(){
        var_dump($_POST);
        exit;
    }
}