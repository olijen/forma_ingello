<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\product\records\FieldProductValue */

$this->title = 'Create Field Product Value';
$this->params['breadcrumbs'][] = ['label' => 'Field Product Values', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="field-product-value-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
