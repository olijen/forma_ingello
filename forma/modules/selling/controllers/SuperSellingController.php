<?php

namespace forma\modules\selling\controllers;

use forma\components\AccessoryActiveRecord;
use forma\modules\customer\records\Customer;
use forma\modules\selling\records\selling\Selling;
use forma\modules\selling\records\state\State;
use forma\modules\selling\services\SuperSellingHasEditableService;
use Yii;
use forma\modules\selling\records\superselling\SellingSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SuperSellingController implements the CRUD actions for Selling model.
 */
class SuperSellingController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Selling models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SellingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if (Yii::$app->request->post('hasEditable')) {
            $requestPost = Yii::$app->request->post();
            $superSellingEditableService = new SuperSellingHasEditableService();
            $superSellingEditableService
                ->setAttribute($requestPost['editableKey'], $requestPost['editableIndex'], $requestPost['editableAttribute'], $requestPost['Selling']);
            if ($output = $superSellingEditableService->editColumn()) {
                $data = ['output' => $output];
                return json_encode($data);
            } else {
                return false;
            }
        }
        $sellingExport = Selling::find()->joinWith(['accessory'])
            ->joinWith(['warehouse', 'warehouse.warehouseUsers', 'customer', 'toState'], false, 'LEFT JOIN')
            ->joinWith(['sellingProducts' => function ($q) {
                $q->joinWith('product');
            }])
            ->where(['warehouse_user.user_id' => Yii::$app->user->id])
            ->orWhere(['warehouse_user.user_id' => null])
            ->andWhere(['accessory.entity_class' => Selling::className()])
            ->andWhere(['in', 'accessory.user_id', Yii::$app->user->id])
            ->select(['selling.id', 'customer.name as customerName', 'customer.chief_phone as customerPhone'
                , 'warehouse.name as warehouseName', 'state.name as stateName', 'product.name as productName',
                'selling_product.cost as cost', 'selling_product.quantity as quantity', '(selling_product.cost*selling_product.quantity) as sum'])->asArray();
        $exportprovider = new ActiveDataProvider([
            'query' => $sellingExport,
        ]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'sellingExport' => $sellingExport,
            'exportprovider' => $exportprovider,
        ]);
    }
}
