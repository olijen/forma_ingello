<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\product\records\PackUnit */

$this->title = 'Изменить упаковку: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Объекты', 'url' => '/product'];
$this->params['breadcrumbs'][] = ['label' => 'Упаковки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name;
?>
<div class="pack-unit-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
