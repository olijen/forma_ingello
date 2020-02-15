<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\talk\Request */

$this->title = Yii::t('app', 'Обновить {modelClass}: ', [
    'modelClass' => 'Request',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Вопрос'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Обновить');
?>
<div class="request-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
