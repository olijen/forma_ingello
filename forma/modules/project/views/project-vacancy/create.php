<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model forma\modules\project\records\projectvacancy\ProjectVacancy */
/* @var $id */
/* @var $vacancy_id */

$this->title = Yii::t('app', 'Создать вакансию на проект');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Вакансии проектов'), 'url' => ['index']];

?>
<div class="project-vacancy-create">

    <?= $this->render('_form', [
        'model' => $model,
        'id' => $id,
        'vacancy_id' => $vacancy_id,
    ]) ?>

</div>
