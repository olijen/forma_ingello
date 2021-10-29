<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \wokster\ltewidgets\BoxWidget;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $searchModel forma\modules\core\records\RuleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Правила';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rule-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php BoxWidget::begin([
        'title' => '<small class="m-l-sm">записей ' . $dataProvider->getCount() . ' из ' . $dataProvider->getTotalCount() . '</small>',
        'buttons' => [
            ['link', '<i class="fa fa-plus-circle" aria-hidden="true"></i>', ['create'], ['title' => 'создать Правило']]
        ]
    ]);

    ?>

    <?php Pjax::begin(['id' => 'grid']) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'rule_name',
            [
                'attribute' => 'action',
                'label' => 'Событие',
                'value' => 'action',
                'filter' => Html::activeDropDownList($searchModel, 'action',
                    [''=>'','insert'=>'insert', 'update'=>'update','delete'=>'delete'],
                    ['placeholder' => 'Выбрать событие...','class' => 'form-control']),
            ],

            [
                'attribute' => 'table',
                'label' => 'Таблица',
                'value' => 'table',
                'filter' => Html::activeDropDownList($searchModel, 'table',
                    $tables,
                    ['placeholder' => 'Выбрать таблицу...','class' => 'form-control']),
            ],

            'count_action',
            [
                'attribute' => 'item',
                'label' => 'Элемент',
                'value' => 'item.title',
                'filter' => Html::activeDropDownList($searchModel, 'item',
                    $items,
                    ['placeholder' => 'Выбрать элемент...','class' => 'form-control','prompt' =>'']),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

    <?php BoxWidget::end(); ?>

</div>
