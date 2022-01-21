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

    <?php Pjax::begin(['id' => 'grid'])?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}',
            ],
            [
                'attribute' => 'rank_id',
                'value' => 'rank.name',
                'filter' => \yii\helpers\ArrayHelper::map(\forma\modules\core\records\Rank::find()->select(['id', 'name'])->asArray()->allAccessory(), 'id', 'name'),
            ],
            'module:ntext',
            [
                'attribute' => 'key',
                'value' => function ($model) {
                    $params = Yii::$app->params['access-interface'];
                    return $params[$model->module][$model->key];
                },
            ],
        ],
    ]); ?>

    <?php Pjax::end();?>


</div>
