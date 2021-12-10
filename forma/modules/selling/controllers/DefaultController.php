<?php

namespace forma\modules\selling\controllers;

use forma\modules\selling\forms\SalesProgress;
use forma\components\Controller;
use forma\modules\selling\records\sellinghistory\SellingHistory;
use forma\modules\selling\services\SellingService;
//use forma\modules\selling\records\sellinghistory;
use Yii;

/**
 * Default controller for the `selling` module
 */
class DefaultController extends Controller
{

    public $date;
    public $sellinghistory;

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
