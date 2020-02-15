<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\talk\Answer */

$this->title = Yii::t('app', 'Обновить {modelClass}: ', [
    'modelClass' => 'Answer',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ответы'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Обновить');
?>
<div class="answer-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
