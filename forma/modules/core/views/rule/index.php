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
    <?= Html::a('<i class="fas fa-user-plus"></i> Создать правило', ['create'], ['class' => 'btn btn-success forma_green btn-all-screen','style'=>'margin-bottom:10px;']) ?>



    <?php Pjax::begin(['id' => 'grid']) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
            ],
            'rule_name',
            [
                'attribute' => 'action',
                'label' => 'Событие',
                'value' => function($searchModel){
                    if($searchModel->action=='insert')return"Вставить";else if($searchModel->action=='update')
                        return"Обновить";else if($searchModel->action=='delete')return"Удалить";else return"-";
                },
                'filter' => Html::activeDropDownList($searchModel, 'action',
                    [''=>'','insert'=>'Вставить', 'update'=>'Обновить','delete'=>'Удалить'],
                    ['placeholder' => 'Выбрать событие...','class' => 'form-control']),
            ],

            [
                'attribute' => 'table',
                'label' => 'Таблица',
                'value' =>function($searchModel){
                    if(!empty(Yii::$app->params['translateTablesName'][$searchModel->table])){
                        return Yii::$app->params['translateTablesName'][$searchModel->table];
                    }
                },
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


        ],
    ]); ?>

    <?php Pjax::end(); ?>


</div>
