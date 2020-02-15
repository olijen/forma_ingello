<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\product\records\TaxRate */

$this->title = 'Изменить налоговую ставку: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Объекты', 'url' => '/product'];
$this->params['breadcrumbs'][] = ['label' => 'Налоговые ставки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="tax-rate-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
