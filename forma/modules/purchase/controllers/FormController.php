<?php

namespace forma\modules\purchase\controllers;

use Symfony\Component\VarDumper\Exception\ThrowingCasterException;
use Yii;
use forma\modules\purchase\services\PurchaseService;
use forma\modules\purchase\widgets\PurchaseFormView;
use forma\components\Controller;
use yii\web\HttpException;

class FormController extends Controller
{
    public function actionIndex($id = null)
    {
        $model = PurchaseService::get($id);
        if (!empty($model)) {
            if (isset($_GET['Purchase']['warehouse_id'])) {
                if ($model->load($_GET)) {
                    return $this->render('index', ['model' => $model]);
                }
            }

            return $this->render('index', ['model' => $model]);
        } else {
            throw new HttpException(400, '$model = PurchaseService::get($id) is null.');
        }
    }
    
    public function actionWidget($id = null)
    {
        $model = PurchaseService::get($id);
        return PurchaseFormView::widget(['model' => $model]);
    }

    public function actionSave($id = null)
    {
        if (!isset($_POST['Purchase']['supplier_id'])) {
            return Yii::$app->controller->redirect('/purchase/form/index?needSupplier&Purchase[warehouse_id]='.$_POST['Purchase']['warehouse_id']);
        }
        $model = PurchaseService::save($id, Yii::$app->request->post());
        if (!$id) {
            return $this->redirect('/purchase/form/index?id='.$model->id);
        }
        return PurchaseFormView::widget(['model' => $model]);
    }
}
