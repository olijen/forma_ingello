<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\hr\records\talk\Request */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Request',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Requests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="request-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
