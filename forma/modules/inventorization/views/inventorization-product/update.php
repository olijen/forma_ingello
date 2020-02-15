<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\inventorization\records\InventorizationProduct */

$this->title = 'Update Inventorization Product: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inventorization Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inventorization-product-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
