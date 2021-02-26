<?php

namespace forma\modules\selling\controllers;

use forma\modules\selling\records\state\StateSearch;
use forma\modules\warehouse\records\WarehouseProduct;
use Yii;
use forma\components\Controller;
use yii\helpers\Url;
use forma\modules\selling\services\SellingService;
use forma\modules\selling\widgets\SellingFormView;
use forma\modules\selling\records\state\State;

class FormController extends Controller
{
    public function actionIndex($id = null)
    {
        $searchModel = new StateSearch();
        if ($searchModel->userSearch(Yii::$app->request->queryParams)->getTotalCount() < 1)
            return $this->redirect('/selling/main-state/index');

        $model = SellingService::get($id);
        $sellingState = State::findOne($model->state_id);
        $userState = State::find()->where(['user_id' => Yii::$app->user->getId()])
            ->all();
        if ($sellingState) {
            $toState = $sellingState->state;
            return $this->render('index', compact('model', 'userState', 'sellingState', 'toState'));
        } else {
            return $this->render('index', compact('model', 'userState', 'sellingState'));
        }
    }

    //
    public function actionChangeSellingProductCost()
    {

        /*
         * todo:Tymur:добавить условие, при котором сюда попадет гость
         *      использовать получение складов по getMyWarehouseUser, для гостя.
         *      поменять цену
        */
        if (!empty($_POST['productId']) && !empty($_POST['quantity'])) {

            $cost = 'consumer_cost';
            $product = WarehouseProduct::findOne(['product_id' => $_POST['productId']]);
            $cost = $product->$cost * $_POST['quantity'];

            return $cost;
        }
        return '';
    }

    public function actionTest()
    {

        $id = $_GET['id'];

        $model = SellingService::get($id);
        $state_id = $_GET['state_id'];
        $sellingState = State::findOne($state_id);
        if ($state_id == 6) {
            $model->date_complete = date('Y-m-d H:i:s');
        }
        if ($sellingState) {
            $model->state_id = $sellingState->id;
            $model->save();

        }
        $userState = State::find()->where(['user_id' => Yii::$app->user->getId()])->asArray()
            ->all();


        if ($sellingState) {
            $toState = $sellingState->state;

            return $this->render('index', compact('model', 'userState', 'sellingState', 'toState'));
        } else {
            return $this->render('index', compact('model', 'userState', 'sellingState'));
        }

    }

    public function actionSave($id = null)
    {
        $model = SellingService::save($id, Yii::$app->request->post());

        if (!$id) {
            return $this->redirect(Url::to(['/selling/form', 'id' => $model->id]));
        }
        return SellingFormView::widget(compact('model'));
    }

}
