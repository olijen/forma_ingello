<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \wokster\ltewidgets\BoxWidget;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel forma\modules\core\records\AccessInterfaceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Интерфейсы доступа';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="access-interface-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?php BoxWidget::begin([
        'title'=>'Интерфейс доступа <small class="m-l-sm">записей '.$dataProvider->getCount().' из '.$dataProvider->getTotalCount().'</small>',
        'buttons' => [
            ['link', '<i class="fa fa-plus-circle" aria-hidden="true"></i>',['create'],['title'=>'создать Интерфейс доступа']]
        ]
    ]);
    ?>

    <?php Pjax::begin(['id' => 'grid'])?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'current_mark',
            [
                'attribute' => 'rule_name',
                'value' => 'rule.rule_name',
                'label' => 'Правило',
            ],
            [
                'attribute' => 'user',
                'value' => 'user.email',
                'label' => 'Пользователь',
            ],
            [
                'attribute' => 'status',
                'value' => 'status',
                'label' => 'Статус',
                'filter' => Html::activeDropDownList($searchModel, 'status',
                    ['1'=>'true','0'=>'false'],
                    ['placeholder' => 'Выбрать таблицу...','class' => 'form-control','prompt' =>'']),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end();?>

    <?php BoxWidget::end();?>


</div>
