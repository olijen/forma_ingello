<?php

namespace forma\modules\core\controllers;

use Composer\Util\Url;
use forma\modules\product\services\ProductService;
use forma\modules\purchase\services\PurchaseService;
use forma\modules\selling\forms\SalesProgress;
use forma\modules\transit\services\TransitService;
use forma\modules\selling\services\SellingService;
use yii\web\Controller;
use yii\filters\AccessControl;
use forma\modules\core\components\UserIdentity;

class DefaultController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'confirm'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['confirm', ],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', ],
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
        $completeSellingsCount = SellingService::getCompleteCount();
        $salesProgress = new SalesProgress();

        return $this->render('index', compact(
            'productsCount',
            'completePurchasesCount',
            'completeTransitsCount',
            'completeSellingsCount',
            'salesProgress'
        ));
    }

    public function actionPeople()
    {
        return $this->render('people');
    }

    public function actionConfirm(){
        $this->layout = 'main-login';
        $confirmed = false;
        if(isset($_GET['email_string']) && !is_null(UserIdentity::findByEmailString($_GET['email_string']))){
            $user = UserIdentity::findByEmailString($_GET['email_string']);
            $user->confirmed_email = 1;
            $user->email_string = null;
            $user->save();
            $confirmed = true;
        }
        return $this->render('confirm', compact('confirmed'));
    }
}
