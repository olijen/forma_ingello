<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model forma\modules\hr\records\SellingProduct */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Selling Products', 'url' => ['index']];

?>
<div class="selling-product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'vacancy_id',
                'value' => $model->getVacancyTitle(),
            ],
            [
                'attribute' => 'interview_id',
                'value' => $model->getInterviewName(),
            ],
            'quantity',
            'cost',
            'cost_type',
            [
                'attribute' => 'pack_unit_id',
                'value' => $model->packUnit->name,
                'label' => 'Упаковка',
            ]
        ],
    ]) ?>

</div>
