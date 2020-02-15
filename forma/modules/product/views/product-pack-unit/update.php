<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\product\records\ProductPackUnit */

$this->title = 'Update Product Pack Unit: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Product Pack Units', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-pack-unit-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
