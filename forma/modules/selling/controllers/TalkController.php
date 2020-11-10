<?php

namespace forma\modules\selling\controllers;

use forma\modules\customer\records\Customer;
use forma\modules\selling\records\talk\Answer;
use forma\modules\selling\services\AnswerService;
use forma\modules\selling\services\RequestService;
use forma\modules\selling\services\RequestStrategyService;
use forma\modules\selling\services\SellingService;
use http\Url;
use yii\web\Controller;
use Yii;
use yii\web\NotFoundHttpException;
use forma\modules\selling\widgets\HistoryView;

/**
 * Default controller for the `script` module
 */
class TalkController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        if(!empty(Yii::$app->request->post('select')) & !empty(Yii::$app->request->post('id'))) {
            return $this->render('index', [
                'model' =>  RequestStrategyService::getStrategyRequests(Yii::$app->request->post('select')),
                'sellingId' => Yii::$app->request->post('id'),
                'customer' => SellingService::get(Yii::$app->request->post('id'))->getCustomer()->one(),
                'customAnswer' => AnswerService::getAnswer(),
            ]);
        }

        return $this->redirect(\Yii::$app->request->referrer);
    }

    public function actionSaveDialog()
    {
        $selling = SellingService::get(Yii::$app->request->post('id'));
        $selling->dialog = date('d.m.Y H:i:s') .
                            '<br/>' .
                            Yii::$app->request->post('dialog') .
                            '<br/>' .
                            Yii::$app->request->post('comment').
                            '<br/>' .
                            Yii::$app->request->post('nextStep')
                            . $selling->dialog;

        $selling->next_step = Yii::$app->request->post('nextStep');
        $selling->save();
    }

    public function actionSaveCustomAnswer()
    {
        $answer = AnswerService::getAnswer();
        $answer->text = Yii::$app->request->get('answer');
        $answer->request_id = Yii::$app->request->get('requestId');
        $answer->save();

        return $answer->id;
    }


    public function actionEndTalk($sellingId)
    {
        $customer = Customer::find()->where(['id' => Yii::$app->request->post()])->one();

        if ($customer->load(Yii::$app->request->post()) && $customer->save()) {
            return \Yii::$app->response->redirect(\yii\helpers\Url::to(['/selling/form?id=' . $sellingId]));

        }

        throw new NotFoundHttpException('User not found');
    }

    public function actionCommentHistory()
    {
        $selling = SellingService::get(Yii::$app->request->post('id'));
        $_COOKIE['selling_token'] = $_POST['selling_token'];
        $_GET['selling_token'] = $_POST['selling_token'];
        if (strlen(Yii::$app->request->post('comment')) > 0) {
            if (!Yii::$app->user->isGuest)
                $selling->dialog .=
                    date('d.m.Y H:i:s') .
                    '<br/>' .
                    '<div style="background: #c5ddfc;" class="alert alert-primary" role="alert">Менеджер: ' . Yii::$app->request->post('comment') . '</div>';
            else
                $selling->dialog .=
                    date('d.m.Y H:i:s') .
                    '<br/>' .
                    '<div style="background: #ccc;" class="alert alert-primary" role="alert">Клиент: ' . Yii::$app->request->post('comment') . '</div>';

            $selling->save();
        }

        return  HistoryView::widget(['model' => $selling, 'talk' => false, 'history' => null]);

    }


}
