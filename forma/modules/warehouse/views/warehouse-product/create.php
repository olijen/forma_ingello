<?php

use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model forma\modules\warehouse\records\WarehouseProduct */

$this->title = 'Создать объект хранилища';
$this->params['breadcrumbs'][] = ['label' => 'Хранилища', 'url' => '/warehouse/warehouse'];
$this->params['breadcrumbs'][] = [
    'label' => $warehouse->name,
    'url' => Url::to(['/warehouse/warehouse/view', 'id' => $warehouse->id]),
];


?>
<div class="warehouse-product-create">

    <?= $this->render('_form', compact('model', 'warehouse')) ?>

</div>
