<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel forma\modules\worker\records\WorkerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Кадры');
$this->params['homeLink'] = ['label' => 'Панель упраления', 'url' => '/hr', 'title' => 'Панель управления модулем найма'];

?>
<div class="worker-index">

    <p>
        <?= Html::a(Yii::t('app', '<i class="fas fa-user-plus"></i> Новый кадр'), ['create'], ['class' => 'btn btn-success forma_pink']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showFooter' => true,
        'columns' => [
            ['class' => 'yii\grid\ActionColumn','contentOptions' => ['style' => 'width:10%;  min-width:10%;  ']],
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($data) {
                    return $data->status ? 'Работает' : 'Свободен';
                }
            ],
            'name',
            'surname',
            [
                'attribute' => 'date_birth',
                'format' => 'raw',
                'filter' => DatePicker::widget([
                    'name' => 'WorkerSearch[date_birth]',
                    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ],
                    'value' => isset($_GET['WorkerSearch']['date_birth']) ?
                        $_GET['WorkerSearch']['date_birth'] : '',
                ]),
            ],

            [
                'attribute' => 'gender',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->gender ? 'Ж' : 'М';
                }
            ],
            'passport',

        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
