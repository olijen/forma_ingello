<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\inventorization\records\Inventorization */

$this->title = 'Изменить инвентаризацию: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Инвентаризация', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="inventorization-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
