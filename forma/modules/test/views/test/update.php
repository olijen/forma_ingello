<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\test\records\TestTypeField */



$this->title = 'Изменить вопрос: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Test Type Fields', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="test-type-field-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
