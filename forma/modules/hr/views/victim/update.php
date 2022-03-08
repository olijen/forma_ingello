<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Victim */

$this->title = 'Редактировать данные пострадавшего: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Victims', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="victim-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
