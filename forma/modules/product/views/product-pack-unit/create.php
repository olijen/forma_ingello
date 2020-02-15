<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model forma\modules\product\records\ProductPackUnit */

$this->title = 'Create Product Pack Unit';
$this->params['breadcrumbs'][] = ['label' => 'Product Pack Units', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-pack-unit-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
