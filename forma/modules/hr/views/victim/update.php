<?php

/* @var $this yii\web\View */
/* @var $model forma\modules\hr\models\Victim */

$this->title = 'Редактировать Пострадавшего: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Пострадавшие', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="victim-update">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
