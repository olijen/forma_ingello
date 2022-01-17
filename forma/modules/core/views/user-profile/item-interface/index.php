<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \wokster\ltewidgets\BoxWidget;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel forma\modules\core\records\ItemInterfaceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Интерфейсы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-interface-index">
    
    <?= Html::a('<i class="fas fa-user-plus"></i> Создать интерфейс', ['create'], ['class' => 'btn btn-success forma_green','style'=>'margin:10px;']) ?>



    <?php Pjax::begin(['id' => 'grid'])?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'rank_id',
            'module:ntext',
            'key:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end();?>


</div>
