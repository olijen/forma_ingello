<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\SellingProduct */

$this->title = 'Create Selling Product';
$this->params['breadcrumbs'][] = ['label' => 'Selling Products', 'url' => ['index']];

?>
<div class="selling-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model', 'sellingId')) ?>

</div>
