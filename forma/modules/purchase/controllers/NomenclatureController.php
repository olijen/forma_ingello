<?php

namespace forma\modules\purchase\controllers;

use forma\extensions\editable\EditCellAction;
use forma\modules\overheadcost\records\OverheadCost;
use forma\modules\overheadcost\services\OverheadCostService;
use forma\modules\purchase\records\purchaseproduct\PurchaseProduct;
use Yii;
use forma\modules\purchase\services\NomenclatureService;
use forma\modules\purchase\services\PurchaseService;
use forma\modules\purchase\widgets\NomenclatureView;
use forma\components\Controller;
use yii\web\Response;

class NomenclatureController extends Controller
{
    public function actionAddPosition()
    {
        /** @var PurchaseProduct $model */
        $model = NomenclatureService::addPosition(Yii::$app->request->post());

        return NomenclatureView::widget([
            'model' => $model,
            'purchaseId' => $model->purchase_id,
        ]);
    }
    
    public function actionDeletePosition($id)
    {
        $model = NomenclatureService::deletePosition($id);
        return NomenclatureView::widget([
            'purchaseId' => $model->purchase_id,
        ]);
    }

    public function actionAddOverheadCost($id)
    {
        PurchaseService::addOverheadCost($id);

        return NomenclatureView::widget([
            'purchaseId' => $id,
        ]);
    }

    public function actionDeleteOverheadCost($id, $purchaseId)
    {
        OverheadCostService::delete($id);

        return NomenclatureView::widget([
            'purchaseId' => $purchaseId,
        ]);
    }

    public function actionChangeNomenclatureCell()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return NomenclatureService::changeCell(Yii::$app->request->post());
    }

    public function actionChangeUnitCost()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return NomenclatureService::changeCell(Yii::$app->request->post(), 'costLabel');
    }

    public function actionChangePositionOverheadCost()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return NomenclatureService::changePositionOverheadCost(Yii::$app->request->post());
    }

    public function actionChangeOverheadCost()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return NomenclatureService::changeOverheadCost(Yii::$app->request->post());
    }

    public function actions()
    {
        return [
            'editCell' => [
                'class' => EditCellAction::className(),
                'modelClass' => PurchaseProduct::className(),
            ],
            'editOverheadCostCell' => [
                'class' => EditCellAction::className(),
                'modelClass' => OverheadCost::className(),
            ],
        ];
    }

    public function actionChangePack($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return NomenclatureService::changePack($id, Yii::$app->request->post());
    }

    public function actionChangeCurrency($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return NomenclatureService::changeCurrencyByPost($id, Yii::$app->request->post());
    }
}
