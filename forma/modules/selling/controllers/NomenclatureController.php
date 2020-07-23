<?php

namespace forma\modules\selling\controllers;

use forma\extensions\editable\EditCellAction;
use forma\modules\selling\records\selling\Selling;
use forma\modules\selling\services\SellingService;
use forma\modules\warehouse\services\RemainsService;
use Yii;
use forma\modules\selling\records\sellingproduct\SellingProduct;
use forma\modules\selling\services\NomenclatureService;
use forma\modules\selling\widgets\NomenclatureView;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\web\HttpException;
use yii\widgets\ActiveForm;

class NomenclatureController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['editCell', 'deletePosition', 'addPosition', 'actionValidate'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['editCell', 'deletePosition', 'addPosition', 'actionValidate'],
                        'roles' => ['?', '@'],
                    ],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }

    public function actionAddPosition()
    {

        $selling_token = null;
        if(isset($_POST['selling_token'])){
            $selling_token = $_POST['selling_token'];
            setcookie('selling_token', $selling_token, time()+36000);
        } else if(isset($_COOKIE['selling_token'])){
            $selling_token = $_COOKIE['selling_token'];
            $_GET['selling_token'] = $_COOKIE['selling_token'];
        }



        /** @var SellingProduct $model */
        $post = Yii::$app->request->post();
        $sellingId = $post['SellingProduct']['selling_id'];
        $selling = Selling::findOne($sellingId);
        $selling_token = $selling->getSellingToken();
        Yii::debug($selling_token);
        Yii::debug($post);
        if(Yii::$app->user->isGuest){
            if(!isset($post['selling_token']) || is_null($post['selling_token'])) return false;
            if($selling_token != $post['selling_token']) return false;
        }
        $model = NomenclatureService::addPosition(Yii::$app->request->post());
        if ($model->hasErrors()) Yii::debug(json_encode($model->errors));

        return NomenclatureView::widget([
            'sellingId' => $model->selling_id,
            'model' => $model,
            'selling_token' => $post['selling_token'] ?? null
        ]);
    }

    public function actionDeletePosition($id)
    {
        /** @var SellingProduct $model */
        $selling_token_get = Yii::$app->request->get('selling_token');
        $selling_token = Selling::findOne(SellingProduct::findOne($id)->selling_id)->selling_token;
        Yii::debug($selling_token . ' = ' . $selling_token_get);
        if(Yii::$app->user->isGuest){
            if(!isset($selling_token_get) || is_null($selling_token_get)) return false;
            if($selling_token != $selling_token_get) return false;
        }
        Yii::debug('suda proshli');
        $model = NomenclatureService::deletePosition($id);
        Yii::debug('after delete');
        if ($model->hasErrors()) Yii::debug(json_encode($model->errors));

        //$selling = Selling::findOne($model->selling_id);
        return NomenclatureView::widget([
            'sellingId' => $model->selling_id,
            'model' => $model,
            'selling_token' => $selling_token_get
        ]);
    }

    public function actionGetProductCost()
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $response = ['success' => true];

            $productId = Yii::$app->request->post('productId');
            $sellingId = Yii::$app->request->post('sellingId');
            $costType = Yii::$app->request->post('costType');

            $cost = NomenclatureService::getProductCost($productId, $sellingId, $costType);
            
            return array_merge($response, ['cost' => $cost]);
        }

        throw new HttpException(404 ,'Page not found');
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

    public function actionValidate()
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            /** @var SellingProduct $model */
            $model = NomenclatureService::createPosition();
            $model->load(Yii::$app->request->post());
            return ActiveForm::validate($model);
        }
    }

    public function actions()
    {
        return [
            'editCell' => [
                'class' => EditCellAction::className(),
                'modelClass' => SellingProduct::className(),
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
