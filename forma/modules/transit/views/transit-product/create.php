<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model forma\modules\transit\records\TransitProduct */

$this->title = 'Create Transit Product';
$this->params['breadcrumbs'][] = ['label' => 'Transit Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transit-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model', 'transitId')) ?>

</div>
