<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \wokster\ltewidgets\BoxWidget;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel forma\modules\core\records\RankSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ранги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rank-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= Html::a('<i class="fas fa-user-plus"></i> Создать ранг', ['create'], ['class' => 'btn btn-success forma_green','style'=>'margin:10px;']) ?>


    <?php Pjax::begin(['id' => 'grid'])?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
            ],

            'id',
            'name:ntext',
            'image:ntext',
            'order',

        ],
    ]); ?>

    <?php Pjax::end();?>


</div>
