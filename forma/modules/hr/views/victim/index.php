<?php

use forma\modules\hr\records\victim\Victim;
use kartik\daterange\DateRangePicker;
use yii\helpers\Html;
use yii\widgets\Pjax;
use forma\extensions\editable\GridView;

/* @var $this yii\web\View */
/* @var $searchModel forma\modules\hr\models\VictimSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пострадавшие';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="victim-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Добавить пострадавшего'), ['create'], ['class' => 'btn btn-success btn-all-screen']) ?>
    </p>

    <?php Pjax::begin(['id' => 'grid'])?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'isEditable' => true,
        'responsiveWrap' => false,
        'updateUrl' => \yii\helpers\Url::to(['/hr/victim/index']),
        'columns' => [
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}{update}',
            ],
            'id',
            'fullname:ntext',
            [
                'attribute' => 'birthday',
                'format' => ['date', 'php:d.m.Y'],
            ],
            [
                'attribute' => 'is_child',
                'value' => function ($model) {
                    if (date_diff(new DateTime(), new DateTime($model->birthday))->y >= 18) {
                        return 'нет';
                    } else {
                        return 'да';
                    }
                }
            ],
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
                'format' => ['date', 'php:d.m.Y'],
            ],
            'stay_for:ntext',
            'questions:ntext',
            'specialization:ntext',
            'destination:ntext',
        ],
    ]); ?>

    <?php Pjax::end();?>


</div>
