<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model forma\modules\inventorization\records\InventorizationProduct */

$this->title = 'Create Inventorization Product';
$this->params['breadcrumbs'][] = ['label' => 'Inventorization Products', 'url' => ['index']];

?>
<div class="inventorization-product-create">

    <?= $this->render('_form', compact('model', 'inventorizationId')) ?>

</div>
