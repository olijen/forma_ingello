<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\project\records\projectvacancy\ProjectVacancy */

$this->title = Yii::t('app', 'Редактировать вакансию на проект: ' . $model->project_id, [
    'nameAttribute' => '' . $model->project_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Вакансии проектов'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->project_id, 'url' => ['view', 'project_id' => $model->project_id, 'vacancy_id' => $model->vacancy_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="project-vacancy-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    

</div>
