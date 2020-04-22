<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model forma\modules\project\records\projectvacancy\ProjectVacancy */

$this->title = $model->project_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Вакансии проектов'), 'url' => ['index']];

\yii\web\YiiAsset::register($this);
?>
<div class="project-vacancy-view">


    <p>
        <?= Html::a(Yii::t('app', 'Редактировать'), ['update', 'project_id' => $model->project_id, 'vacancy_id' => $model->vacancy_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'project_id' => $model->project_id, 'vacancy_id' => $model->vacancy_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Вы уверены что хотите удалить запись?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
        ],
    ]) ?>

</div>
