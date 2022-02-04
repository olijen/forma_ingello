<?php

namespace forma\modules\hr\controllers;

use forma\modules\hr\records\interview\Interview;
use forma\modules\hr\records\interviewstate\InterviewState;
use forma\modules\project\records\projectvacancy\ProjectVacancy;
use forma\modules\vacancy\records\Vacancy;
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
        $interviewState = [];
        if (!empty($model->state_id)) {
            $interviewState = InterviewState::findOne($model->state_id);
        }
        $vacancy = Vacancy::getListVacancyProject();

        if (!empty($projectId) && !empty($vacancyId) && !empty($model)) {
            $model->project_id = $projectId;
            $model->vacancy_id = $vacancyId;
        }
        return $this->render('index', compact('model', 'userState', 'interviewState', 'vacancy'));
    }

    public function actionSave($id = null)
    {
        if (isset($_POST['Interview']['vacancy_id'])) {
            $projectVacancyId = $_POST['Interview']['vacancy_id'];
            $projectVacancy = ProjectVacancy::find()->where(['id' => $projectVacancyId])->one();
            $model = new Interview();
            $model->project_id = $projectVacancy->project_id;
            $model->vacancy_id = $projectVacancy->vacancy_id;
            $model->date_create = date('d.m.Y');
            $model->worker_id = $_POST['Interview']['worker_id'];
            $model->name = '-';
            if (!empty($state_id = InterviewState::find()->where(['user_id' => Yii::$app->user->id])->one()->id)) {
                $model->state_id = $state_id;
            }
            if ($model->save()) {
                return $this->redirect(Url::to(['/hr/form', 'id' => $model->id]));
            }
        }

        $interview = InterviewService::get($id);
        if ($interview) {
            $model = InterviewService::save($id, Yii::$app->request->post());
        }
        if ($interview) {
            $id = Yii::$app->request->get('id');
            $stateId = Yii::$app->request->get('state_id');
            $model = InterviewService::get($id);
            $model->state_id = (int)$stateId;
            $model->save();
            return $this->redirect(Url::to(['/hr/form', 'id' => $model->id]));
        }
        if (!$id) {
            return $this->redirect(Url::to(['/hr/form', 'id' => $model->id]));
        }
        return $this->redirect(Url::to(['/hr/form']));
    }
}
