<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\warehouse\records\Warehouse */

$this->title = 'Update Warehouse: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Warehouses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name;
?>
<div class="warehouse-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
