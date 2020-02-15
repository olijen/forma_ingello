<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model forma\modules\warehouse\records\WarehouseUser */

$this->title = 'Create Warehouse User';
$this->params['breadcrumbs'][] = ['label' => 'Warehouse Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="warehouse-user-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
