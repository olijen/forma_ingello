<?php

use yii\helpers\Html;
use yii\grid\GridView;
use forma\modules\test\records\TestType;
use forma\modules\test\records\TestSearch;

/* @var $this yii\web\View */
/* @var $model app\modules\test\records\TestType */
/* @var $searchModel app\modules\test\records\TestTypeFieldSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

var_dump($searchModel->attributes);
$this->title = 'Создать тест для:';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-type-field-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить вопрос', ['create'], ['class' => 'btn btn-success']) ?>
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
            'test_id',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
