<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model forma\modules\customer\records\Customer */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'firm',
            'chief_phone',
            'company_phone',
            'company_email',
            'chief_email',
            [
                'attribute' => 'country_id',
                'value' => $model->country->name,
            ],
            'address',
            'tax_rate',
        ],
    ]) ?>

</div>
