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
            $projectVacancy = ProjectVacancy::find()->where(['project_id' => $projectId, 'vacancy_id' => $vacancyId])->one();
            $model->project_id = $projectId;
            $model->vacancy_id = $projectVacancy->id;
        }

        return $this->render('index', compact('model', 'userState', 'interviewState', 'vacancy'));
    }

    public function actionSave($id = null)
    {
        if (isset($_POST['Interview']['vacancy_id'])) {
            $projectVacancyId = $_POST['Interview']['vacancy_id'];
            $workerId = $_POST['Interview']['worker_id'];
            $projectVacancy = ProjectVacancy::find()->where(['id' => $projectVacancyId])->one();
            $interviewWorker = Interview::find()->where(['worker_id' => $workerId, 'vacancy_id' => $projectVacancy->vacancy_id])->one();

            if ($interviewWorker) {
                return $this->redirect(Url::to(['/hr/form', 'id' => $interviewWorker->id]));
            }

            $model = new Interview();
            $model->project_id = $projectVacancy->project_id;
            $model->vacancy_id = $projectVacancy->vacancy_id;
            $model->date_create = date('d.m.Y');
            $model->worker_id = $_POST['Interview']['worker_id'];
            $model->name = '-';

            if (empty($model->state)) {
                $model->state_id = isset(InterviewState::find()->where(['user_id' => Yii::$app->user->id])->one()->id)
                    ? InterviewState::find()->where(['user_id' => Yii::$app->user->id])->one()->id : null;
            }

            if ($model->save()) {
                return $this->redirect(Url::to(['/hr/form', 'id' => $model->id]));
            }
        }

        $id = Yii::$app->request->get('id');
        $stateId = Yii::$app->request->get('state_id');
        $model = InterviewService::get($id);

        if ($model) {
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
