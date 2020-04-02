<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model forma\modules\worker\records\workervacancy\WorkerVacancy */

$this->title = Yii::t('app', 'Create Worker Vacancy');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Worker Vacancies'), 'url' => ['index']];
?>
<div class="worker-vacancy-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
