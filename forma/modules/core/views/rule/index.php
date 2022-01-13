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
$this->params['icons'][] = $icons;
/*dd($icons);*/
?>
<div class="rule-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= Html::a('<i class="fas fa-user-plus"></i> Создать правило', ['create'], ['class' => 'btn btn-success forma_green', 'style' => 'margin:10px;']) ?>


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
                'value' => function ($searchModel) {
                    if ($searchModel->action == 'insert') return "Вставить"; else if ($searchModel->action == 'update')
                        return "Обновить"; else if ($searchModel->action == 'delete') return "Удалить"; else return "-";
                },
                'filter' => Html::activeDropDownList($searchModel, 'action',
                    ['' => '', 'insert' => 'Вставить', 'update' => 'Обновить', 'delete' => 'Удалить'],
                    ['placeholder' => 'Выбрать событие...', 'class' => 'form-control']),
            ],

            [
                'attribute' => 'table',
                'label' => 'Таблица',
                'value' => function ($searchModel) {
                    if (!empty(Yii::$app->params['translateTablesName'][$searchModel->table])) {
                        return Yii::$app->params['translateTablesName'][$searchModel->table];
                    }
                }
                ,
                'filter' => Html::activeDropDownList($searchModel, 'table',
                    $tables,
                    ['placeholder' => 'Выбрать таблицу...', 'class' => 'form-control']),
            ],

            'count_action',
            [
                'attribute' => 'item',
                'label' => 'Элемент',
                'value' => 'item.title',
                'filter' => Html::activeDropDownList($searchModel, 'item',
                    $items,
                    ['placeholder' => 'Выбрать элемент...', 'class' => 'form-control', 'prompt' => '']),
            ],

            [
                'attribute' => 'rank_id',
                'label' => 'Ранг',
                'value' => 'rank.name',
                'filter' => \yii\helpers\ArrayHelper::map(\forma\modules\core\records\Rank::find()->select(['id','name'])->asArray()->all(), 'id', 'name'),
            ],
            [
                'attribute' => 'icon',
                'label' => 'Иконка',
                'format' => 'raw',
                'contentOptions' => ['style'=>'text-align: center;'],
                'value' => function ($model) {
                    $iconName = "";
                    foreach ($this->params['icons'][0] as $key=>$icon){
                        if($key == $model->icon){
                            $iconName = $icon;
                            break;
                        }

                    }

                    return "<i class='fa fa-$iconName fa-5x' ></i>";
                }
                ,

            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>


</div>
