<?php

use forma\extensions\kartik\DynaGrid;
use yii\helpers\Html;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel forma\modules\hr\records\interviewvacancy\InterviewVacancy */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Найм';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="selling-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Начать работу с клиентом', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<?php Pjax::begin(); ?>

    <?= DynaGrid::widget([
        'id' => 'interview',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'worker_id',
                'value' => 'workerName',
                'filter' => \forma\modules\worker\records\Worker::getList(),
                'label' => 'Клиент',
            ],
            [
                'attribute' => 'project_id',
                'value' => 'projectName',
                'filter' => \forma\modules\project\records\project\Project::getList(),
                'label' => 'Склад',
            ],
            'name',
            [
                'attribute' => 'date_create',
                'format' => ['date', 'dd.MM.yyyy'],
                'filter' => \kartik\daterange\DateRangePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'date_create',
                    'startAttribute' => 'date_create_from',
                    'endAttribute' => 'date_create_to',
                    'convertFormat' => true,
                    'pluginOptions' => [
                        'locale' => [
                            'format' => 'd.m.Y',
                        ],
                        'opens' => 'left',
                    ],
                ]),
            ],
            [
                'attribute' => 'date_complete',
                'format' => ['date', 'dd.MM.yyyy'],
                'filter' => \kartik\daterange\DateRangePicker::widget([
                    'model' => $searchModel,
                    'convertFormat' => true,
                    'attribute' => 'date_complete',
                    'startAttribute' => 'date_complete_from',
                    'endAttribute' => 'date_complete_to',
                    'pluginOptions' => [
                        'locale' => [
                            'format' => 'd.m.Y',
                        ],
                        'opens' => 'left',
                    ],
                ]),
            ],
            [
                'attribute' => 'state',
                'value' => 'stateName',
                'filter' => \forma\modules\hr\records\interview\Interview::getStatesList(),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

<?php Pjax::end(); ?>

</div>
