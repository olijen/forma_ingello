<?php

namespace forma\modules\hr\controllers;

use forma\modules\worker\records\Worker;
use forma\modules\selling\records\talk\Answer;
use forma\modules\selling\services\AnswerService;
use forma\modules\selling\services\RequestService;
use forma\modules\selling\services\RequestStrategyService;
use forma\modules\hr\services\InterviewService;
use http\Url;
use yii\web\Controller;
use Yii;
use yii\web\NotFoundHttpException;

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
                'requestSearch' => RequestService::getRequest(),
                'model' =>  RequestStrategyService::getStrategyRequests(Yii::$app->request->post('select')),
                'sellingId' => Yii::$app->request->post('id'),
                'worker' => InterviewService::get(Yii::$app->request->post('id'))->getWorker()->one(),
                'customAnswer' => AnswerService::getAnswer(),
            ]);
        }

        return $this->redirect(\Yii::$app->request->referrer);
    }

    public function actionSaveDialog()
    {
        $selling = InterviewService::get(Yii::$app->request->post('id'));
        $selling->dialog .= date('d.m.Y H:i:s') .
                            '<br/>' .
                            Yii::$app->request->post('dialog') .
                            '<br/>' .
                            Yii::$app->request->post('comment').
                            '<br/>' .
                            Yii::$app->request->post('nextStep');

        $selling->next_step = Yii::$app->request->post('nextStep');
        $selling->save();

        return \Yii::$app->response->redirect(\yii\helpers\Url::to(['/hr/form?id=' . $selling->id]));
    }

    public function actionSaveCustomAnswer()
    {
        $answer = AnswerService::getAnswer();
        $answer->text = Yii::$app->request->get('answer');
        $answer->request_id = Yii::$app->request->get('requestId');
        $answer->save();

        return $answer->id;
    }


    public function actionEndTalk()
    {
        $customer = new Worker();
        $workers = $customer->search(['id' => Yii::$app->request->post()])->getModels();

        foreach ($workers as $worker) {
            if ($worker->id == Yii::$app->request->post()) {
                $customer = $worker;
            }
        }

        if ($customer->load(Yii::$app->request->post())) {
            $customer->save();
        }

        return \Yii::$app->response->redirect(\yii\helpers\Url::to(['/hr/form?id=' . $selling->id]));
    }

    public function actionCommentHistory()
    {
        $selling = InterviewService::get(Yii::$app->request->post('id'));
        $selling->dialog .= '<div style="background: orangered;" class="alert alert-primary" role="alert">'.Yii::$app->request->post('comment') . '</div>';

        $selling->save();

        return $selling->dialog;

    }

}
