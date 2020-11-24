<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\test\records\TestTypeFieldSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Test Type Fields';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-type-field-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Test Type Field', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'block_name',
            'label_name',
            'type',
            'value',
            'placeholder',
            'required',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
