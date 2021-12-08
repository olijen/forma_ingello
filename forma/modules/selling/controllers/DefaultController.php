<?php

namespace forma\modules\selling\controllers;

use forma\modules\selling\forms\SalesProgress;
use forma\components\Controller;
use forma\modules\selling\services\SellingService;
use forma\modules\sellinghistory\records\SellingHistory;
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
//        $this->sellinghistory = SellingHistory::find()->all();
//        $result = '';
//
//        foreach ($this->sellinghistory as $date) {
//            $dates = date('d.m.Y',strtotime($date['date']));
//            $result .= '"' . $dates . '",';
//        }

//        $result = substr($result,0,-1);;
//        $result = explode(',',$result);
//        $result = array_reverse($result);
//        $result = implode(',',$result);
//            de($result);

//        $list=array();
//        for($d=1; $d<=31; $d++)
//        {
//            $time=mktime(12, 0, 0, date('m'), $d, date('Y'));
//            if (date('m', $time)==date('m'))
//                $list[]=date('d.m.Y', $time);
//        }
//        $result = '';
//        $list = array_reverse($list);
//        foreach ($list as $dates) {
//
//            $result .= '"' . $dates . '",';
//        }
//        de($list);

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
