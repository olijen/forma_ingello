<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\overheadcost\records\OverheadCost */

$this->title = 'Update Overhead Cost: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Overhead Costs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="overhead-cost-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
