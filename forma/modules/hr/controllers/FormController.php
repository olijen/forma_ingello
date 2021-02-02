<?php

namespace forma\modules\hr\controllers;

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

        if (!empty($projectId) && !empty($vacancyId) && !empty($model) ) {
            $model->project_id = $projectId;
            $model->vacancy_id = $vacancyId;
        }

        return $this->render('index', compact('model'));
    }

    public function actionSave($id = null)
    {
        $model = InterviewService::save($id, Yii::$app->request->post());
        if (!$id) {
            return $this->redirect(Url::to(['/hr/form', 'id' => $model->id]));
        }
        return SellingFormView::widget(compact('model'));
    }
}
