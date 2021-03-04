<?php

namespace forma\modules\purchase\controllers;

use forma\modules\core\records\Accessory;
use forma\modules\purchase\records\purchaseproduct\PurchaseProduct;
use forma\modules\purchase\services\NomenclatureService;
use forma\modules\purchase\services\PurchaseService;
use forma\modules\purchase\widgets\NomenclatureView;
use forma\modules\supplier\records\Supplier;
use Yii;
use yii\filters\VerbFilter;
use forma\components\Controller;

/**
 * Default controller for the `purchase` module
 */
class MainController extends Controller
{
    public function actionIndex()
    {
        $searchModel = PurchaseService::search();
        return $this->render('index', [
            'dataProvider' => $searchModel->search(Yii::$app->request->get()),
            'searchModel' => $searchModel,
        ]);
    }

    public function actionUpdate($id)
    {
        $this->redirect('/purchase/form/index?id='.$id);
    }

    public function actionDelete($id)
    {
        $model = PurchaseService::get($id);
        $model->delete();
        $this->redirect('index');
    }

    public function actionCreateByWarehouse()
    {
        $warehouseId = Yii::$app->request->post('warehouse_id');
        $purchase = PurchaseService::createByWarehouse($warehouseId);

        if ($purchase) {
            return $this->redirect(['/purchase/form/index', 'id' => $purchase->id]);
        }
    }

    public function actionCreateByRemains()
    {
        $supplier = Supplier::findOne(Accessory::findOne([
            'user_id' => Yii::$app->user->id,
            'entity_class' => 'forma\modules\supplier\records\Supplier'
        ]));

        $purchaseData = array_merge(Yii::$app->request->post(), ['supplier_id' => $supplier->id]);
        $purchase = PurchaseService::createByRemains($purchaseData);
        return $this->redirect(['/purchase/form/index', 'id' => $purchase->id]);
    }
}
