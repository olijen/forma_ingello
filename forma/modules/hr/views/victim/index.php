<?php

use forma\modules\hr\records\victim\Victim;
use kartik\daterange\DateRangePicker;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel forma\modules\hr\models\VictimSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пострадавшие';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="victim-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Добавить пострадавшего'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(['id' => 'grid'])?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
            ],
            'id',
            'fullname:ntext',
            [
                'attribute' => 'birthday',
                'filter' => DateRangePicker::widget([
                    'name' => 'date_range_birthday',
                    'presetDropdown' => true,
                    'pluginOptions'=>[
                        'locale' => [
                            'format' => 'DD.MM.Y'
                        ],
                    ],
                    //todo: абстрагировать
                    'value' => isset($_GET['date_range_birthday']) ?
                        $_GET['date_range_birthday'] : Victim::getDateRange(),
                ]),
                'format' => ['date', 'php:d.m.Y H:i:s'],
            ],
            'is_child',
            'place_of_residence:ntext',
            'second_residence:ntext',
            'name_where_to_settle:ntext',
            'settlement_address:ntext',
            'phone:ntext',
            [
                'attribute' => 'registered_at',
                'filter' => DateRangePicker::widget([
                    'name' => 'date_range_registered_at',
                    'presetDropdown' => true,
                    'pluginOptions'=>[
                        'locale' => [
                            'format' => 'DD.MM.Y'
                        ],
                    ],
                    //todo: абстрагировать
                    'value' => isset($_GET['date_range_registered_at']) ?
                        $_GET['date_range_registered_at'] : Victim::getDateRange(),
                ]),
                'format' => ['date', 'php:d.m.Y H:i:s'],
            ],
            'stay_for:ntext',
            'questions:ntext',
            'specialization:ntext',
            'destination:ntext',
        ],
    ]); ?>

    <?php Pjax::end();?>


</div>
