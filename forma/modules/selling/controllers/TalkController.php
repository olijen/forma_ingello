<?php

namespace forma\modules\selling\controllers;

use forma\modules\customer\records\Customer;
use forma\modules\event\records\Event;
use forma\modules\selling\records\selling\Selling;
use forma\modules\selling\records\talk\Answer;
use forma\modules\selling\services\AnswerService;
use forma\modules\selling\services\RequestService;
use forma\modules\selling\services\RequestStrategyService;
use forma\modules\selling\services\SellingService;
use http\Url;
use forma\components\Controller;
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
        $selling->dialog .= date('d.m.Y H:i:s') .
                            '<br/>' .
                            Yii::$app->request->post('dialog') .
                            '<br/>' .
                            Yii::$app->request->post('comment').
                            '<br/>' .
                            Yii::$app->request->post('nextStep');

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
    public function actionHashForEvent()
    {
        $events = Event::find()->all();

        return $this->asJson($events);
    }


    public function actionEndTalk($sellingId)
    {
        $comment = Yii::$app->request->post('comment');
        $nexStep = Yii::$app->request->post('next_step');
        $dateNow = date('d-m-y');
        $selling = Selling::find()->where(['id'=>$sellingId])->one();
        $selling->comment .= "<h6>Дата</h6><p>$dateNow</p><h6>Комментарий</h6> <p>$comment</p> <h6>Следующий шаг</h6> <p>$nexStep</p>";
        $customerId = Yii::$app->request->post('Customer')['id'];
        $customer = Customer::find()->where(['id' => $customerId])->one();
        $customer->name = Yii::$app->request->post('Customer')['name'];
        $customer->firm = Yii::$app->request->post('Customer')['firm'];
        $customer->address = Yii::$app->request->post('Customer')['address'];
        $customer->chief_email = Yii::$app->request->post('Customer')['chief_email'];
        $customer->company_email = Yii::$app->request->post('Customer')['company_email'];
        $customer->chief_phone = Yii::$app->request->post('Customer')['chief_phone'];
        $customer->company_phone = Yii::$app->request->post('Customer')['company_phone'];
        $customer->site_company = Yii::$app->request->post('Customer')['site_company'];
        if ($customer->save() && $selling->save()) {
            return \Yii::$app->response->redirect(\yii\helpers\Url::to(['/selling/form?id=' . $sellingId]));

        }

        throw new NotFoundHttpException('User not found');
    }

    public function actionCommentHistory()
    {
        $selling = SellingService::get(Yii::$app->request->post('id'));
        $_COOKIE['selling_token'] = $_POST['selling_token'];
        $_GET['selling_token'] = $_POST['selling_token'];
        $nowDateAndTime = Yii::$app->request->post('date');
        if (strlen(Yii::$app->request->post('comment')) > 0) {
            if (!Yii::$app->user->isGuest)
                $selling->dialog .=
                    $nowDateAndTime.
                    '<br/>' .
                    '<div style="background: #d2d6de;" class="alert alert-primary" role="alert">Менеджер: ' . Yii::$app->request->post('comment') . '</div>';
            else
                $selling->dialog .=
                    $nowDateAndTime .
                    '<br/>' .
                    '<div style="background: #ccc;" class="alert alert-primary" role="alert">Клиент: ' . Yii::$app->request->post('comment') . '</div>';

            $selling->save();
        }

        return  HistoryView::widget(['model' => $selling, 'talk' => false, 'history' => null]);

    }


}
