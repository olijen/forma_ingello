<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\warehouse\records\WarehouseUser */

$this->title = 'Update Warehouse User: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Warehouse Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="warehouse-user-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
