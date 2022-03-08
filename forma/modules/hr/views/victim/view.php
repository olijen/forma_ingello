<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Victim */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Victims', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="victim-view">

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
            'fullname:ntext',
            'birthday',
            'is_child',
            'place_of_residence:ntext',
            'second_residence:ntext',
            'name_where_to_settle:ntext',
            'settlement_address:ntext',
            'phone:ntext',
            'registered_at',
            'stay_for:ntext',
            'questions:ntext',
            'specialization:ntext',
            'destination:ntext',
        ],
    ]) ?>

</div>
