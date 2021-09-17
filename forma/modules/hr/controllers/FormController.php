<?php

namespace forma\modules\hr\controllers;

use forma\modules\hr\records\interviewstate\InterviewState;
use Yii;
use forma\components\Controller;
use yii\helpers\Url;
use forma\modules\hr\services\InterviewService;
use forma\modules\hr\widgets\SellingFormView;

class FormController extends Controller
{
    public function actionIndex($id = null, $projectId = null, $vacancyId = null)
    {
        $model = InterviewService::get($id);
        $userState = InterviewState::find()
            ->where(['user_id' => Yii::$app->user->getId()])
            ->orderBy('order')
            ->all();
        $interviewState = InterviewState::findOne($model->state_id);
        if (!empty($projectId) && !empty($vacancyId) && !empty($model)) {
            $model->project_id = $projectId;
            $model->vacancy_id = $vacancyId;
        }
        return $this->render('index', compact('model', 'userState', 'interviewState'));
    }

    public function actionSave($id = null)
    {
        $id = Yii::$app->request->get('id');
        $stateId = Yii::$app->request->get('state_id');
        $model = InterviewService::get($id);
        $model->state_id = (int)$stateId;
        $model->save();
        if (!$id) {
            return $this->redirect(Url::to(['/hr/form', 'id' => $model->id]));
        }
        return $this->redirect(Url::to(['/hr/form', 'id' => $model->id]));
    }
}
