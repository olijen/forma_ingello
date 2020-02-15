<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model forma\modules\overheadcost\records\OverheadCost */

$this->title = 'Create Overhead Cost';
$this->params['breadcrumbs'][] = ['label' => 'Overhead Costs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="overhead-cost-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
