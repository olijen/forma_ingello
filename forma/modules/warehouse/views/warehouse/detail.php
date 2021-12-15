<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model \forma\modules\warehouse\records\Warehouse */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Warehouses', 'url' => ['index']];

?>
<div class="warehouse-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            [
                'attribute' => 'country_id',
                'value' => isset($model->country->name)?$model->country->name:null
            ],
            'address',
        ],
    ]) ?>

</div>
