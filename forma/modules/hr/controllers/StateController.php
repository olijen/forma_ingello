<?php

namespace forma\modules\hr\controllers;

use forma\modules\hr\records\interview\Interview;
use forma\modules\project\records\projectvacancy\ProjectVacancy;
use forma\modules\project\records\projectvacancy\ProjectVacancySearch;
use Yii;
use yii\web\Controller;
use forma\modules\hr\services\InterviewService;
use forma\modules\core\widgets\StateView;

class StateController extends Controller
{
    public function actionLead($id) {
        $model = InterviewService::changeState($id, 'Lead');
        return StateView::widget(['model' => $model]);
    }

    public function actionFamiliar($id) {
        $model = InterviewService::changeState($id, 'Familiar');
        return StateView::widget(['model' => $model]);
    }

    public function actionHot($id) {
        $model = InterviewService::changeState($id, 'Hot');
        return StateView::widget(['model' => $model]);
    }

    public function actionMeeting($id) {
        $model = InterviewService::changeState($id, 'Meeting');
        return StateView::widget(['model' => $model]);
    }

    public function actionTestissue($id) {
        $model = InterviewService::changeState($id, 'TestIssue');
        return StateView::widget(['model' => $model]);
    }

    public function actionOffer($id) {
        $model = InterviewService::changeState($id, 'Offer');
        return StateView::widget(['model' => $model]);
    }

    public function actionPayment($id) {
        $model = InterviewService::changeState($id, 'Payment');
        return StateView::widget(['model' => $model]);
    }

    public function actionWork($id) {
        $model = InterviewService::changeState($id, 'Work');
        $interview = Interview::getAccessToOne(['id' => $id]);

        $projectVacancy = ProjectVacancy::getAccessToOne([
            'project_id' => $interview->project_id,
            'vacancy_id' => $interview->vacancy_id
        ]);

        if ($projectVacancy) {
            if ($projectVacancy->count == 1) {
                $projectVacancy->delete();
            } else {
                $projectVacancy->count--;
                $projectVacancy->save();
            }
        }

        $interview->worker->status = 1;
        $interview->worker->collaborated = 1;

        $interview->worker->save();

        return StateView::widget(['model' => $model]);
    }

    public function actionDone($id) {
        $model = InterviewService::changeState($id, 'Done');
        $interview  =  Interview::find()->where(['id' => $id])->one();

        $interview->worker->status = 0;

        $interview->worker->save();

        return StateView::widget(['model' => $model]);
    }

    public function actionArchive($id) {
        $model = InterviewService::changeState($id, 'Archive');
        return StateView::widget(['model' => $model]);
    }
}
