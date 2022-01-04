<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \wokster\ltewidgets\BoxWidget;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel forma\modules\core\records\UserRuleRankSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Условия рангов пользователя';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-rule-rank-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?php BoxWidget::begin([
        'title'=>'Условие ранга пользователя <small class="m-l-sm">записей '.$dataProvider->getCount().' из '.$dataProvider->getTotalCount().'</small>',
        'buttons' => [
            ['link', '<i class="fa fa-plus-circle" aria-hidden="true"></i>',['create'],['title'=>'создать Условие ранга пользователя']]
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
            'user_profile_id',
            'rule_rank_id',
            'date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end();?>

    <?php BoxWidget::end();?>


</div>
