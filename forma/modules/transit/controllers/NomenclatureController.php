<?php

namespace forma\modules\transit\controllers;

use forma\extensions\editable\EditCellAction;
use forma\modules\overheadcost\records\OverheadCost;
use forma\modules\overheadcost\services\OverheadCostService;
use forma\modules\selling\records\sellingproduct\SellingProduct;
use forma\modules\transit\records\transit\Transit;
use forma\modules\transit\records\transitproduct\TransitProduct;
use Yii;
use forma\modules\transit\services\NomenclatureService;
use forma\modules\transit\widgets\NomenclatureView;
use yii\web\Controller;
use forma\modules\transit\services\TransitService;
use yii\web\Response;
use yii\widgets\ActiveForm;

class NomenclatureController extends Controller
{
    public function actionAddPosition()
    {
        if (!Yii::$app->request->isAjax) {
            Yii::debug(Yii::$app->request->referrer);
            return $this->redirect(Yii::$app->request->referrer);
        }
        /** @var SellingProduct $model */
        $model = NomenclatureService::addPosition(Yii::$app->request->post());
        $transit = Transit::findOne(['id' => $model->transit_id]);

        return NomenclatureView::widget([
            'model' => $model,
            'transitId' => $model->transit_id,
            'warehouseId' => $transit->from_warehouse_id,
        ]);
    }

    public function actionDeletePosition($id)
    {
        $model = NomenclatureService::deletePosition($id);
        return NomenclatureView::widget([
            'transitId' => $model->transit_id,
            'warehouseId' => $model->transit->from_warehouse_id,
        ]);
    }

    public function actionAddOverheadCost($id)
    {
        TransitService::addOverheadCost($id);

        return NomenclatureView::widget([
            'transitId' => $id,
        ]);
    }

    public function actionDeleteOverheadCost($id, $transitId)
    {
        OverheadCostService::delete($id);

        return NomenclatureView::widget([
            'transitId' => $transitId,
        ]);
    }

    public function actionChangeNomenclatureCell()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return NomenclatureService::changeCell(Yii::$app->request->post());
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

    public function actionValidate()
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            /** @var TransitProduct $model */
            $model = NomenclatureService::createPosition(null);
            $model->load(Yii::$app->request->post());
            return ActiveForm::validate($model);
        }
    }

    public function actions()
    {
        return [
            'editCell' => [
                'class' => EditCellAction::className(),
                'modelClass' => TransitProduct::className(),
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
}
