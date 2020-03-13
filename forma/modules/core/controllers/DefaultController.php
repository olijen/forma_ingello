<?php

namespace forma\modules\core\controllers;

use forma\modules\product\services\ProductService;
use forma\modules\purchase\services\PurchaseService;
use forma\modules\selling\forms\SalesProgress;
use forma\modules\transit\services\TransitService;
use forma\modules\selling\services\SellingService;
use yii\web\Controller;
use yii\filters\AccessControl;

class DefaultController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $productsCount = ProductService::getCount();
        $completePurchasesCount = PurchaseService::getCompleteCount();
        $completeTransitsCount = TransitService::getCompleteCount();

        $salesProgress = new SalesProgress();

        return $this->render('index', compact(
            'productsCount',
            'completePurchasesCount',
            'completeTransitsCount',
            'salesProgress'
        ));
    }

    public function actionPeople()
    {
        return $this->render('people');
    }
}
