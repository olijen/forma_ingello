<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \wokster\ltewidgets\BoxWidget;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel forma\modules\core\records\RankRuleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Правила рангов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rank-rule-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?php BoxWidget::begin([
        'title'=>'Правило ранга <small class="m-l-sm">записей '.$dataProvider->getCount().' из '.$dataProvider->getTotalCount().'</small>',
        'buttons' => [
            ['link', '<i class="fa fa-plus-circle" aria-hidden="true"></i>',['create'],['title'=>'создать Правило ранга']]
        ]
    ]);
    ?>

    <?php Pjax::begin(['id' => 'grid'])?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'rule_id',
            'rank_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end();?>

    <?php BoxWidget::end();?>


</div>
