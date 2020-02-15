<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel forma\modules\project\records\projectvacancy\ProjectVacancySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Вакансии проектов');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-vacancy-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Создать вакансию на проект'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'project_id',
                'format' => 'raw',
                'value' => function($data){
                    return $data->project->name;
                }
            ],
            [
                'attribute' => 'vacancy_id',
                'format' => 'raw',
                'value' => function($data){
                    return $data->vacancy->name;
                }
            ],
            'count',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
