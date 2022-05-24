<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \wokster\ltewidgets\BoxWidget;
use yii\widgets\Pjax;
use forma\extensions\kartik\DynaGrid;

/* @var $this yii\web\View */
/* @var $searchModel forma\modules\hr\records\interviewstate\InterviewStateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Состояния';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interview-state-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a(Yii::t('app', '<i class="fas fa-plus"></i> Создать состояние'), ['create'], ['class' => 'btn btn-success forma_blue btn-all-screen']) ?>
    </p>


    <?php Pjax::begin(['id' => 'grid'])?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\ActionColumn','contentOptions' => ['style' => 'width:10%;  min-width:10%;  ']],

            ['attribute' => 'name', 'label' => 'Состояния'],
            'order',
        ],
    ]); ?>

    <?php Pjax::end();?>




</div>
