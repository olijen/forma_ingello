<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model forma\modules\worker\records\Worker */

$this->title = $model->name;
$this->params['homeLink'] = ['label' => 'Панель упраления', 'url' => '/hr', 'title' => 'Панель управления модулем найма'];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Кадры'), 'url' => ['index']];

\yii\web\YiiAsset::register($this);
?>
<div class="worker-view">


    <p>
        <?= Html::a(Yii::t('app', 'Обновить'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($data){
                    return $data->status ? 'Работает' : 'Свободен';
                }
            ],
            'name',
            'surname',
            'patronymic',
            'date_birth',
            [
                'attribute' => 'gender',
                'format' => 'raw',
                'value' => function($data){
                    return $data->status ? 'Ж' : 'М';
                }
            ],
            'passport',
            'apply_position',
            'experience',
            [
                'attribute' => 'collaborated',
                'format' => 'raw',
                'value' => function($data){
                    return $data->getCollaborated();
                }
            ],
            [
                'attribute' => 'experience_description',
                'format' => 'html',
                'value' => function($data){
                    return '<div class="col-md-12 content-data">' .  str_replace( '<img', '<img style="max-width: 400px; max-height: 200px" ',  $data->experience_description ) . '</div>';
                }
            ],
            [
                'attribute' => 'workerVacancies',
                'format' => 'html',
                'value' => function($data){
                        $list = '';
                        foreach ($data->workerVacancies as $vacancyId) {
                            $vacancy = \forma\modules\vacancy\records\Vacancy::find()->where(['id' => $vacancyId])->one();
                            $list .= "<a href=/vacancy/vacancy/view?id=$vacancyId'>$vacancy->name </a>";
                        }
                    return $list;
                }
            ],
            [
                'attribute' => 'historyDialog',
                'format' => 'raw',
                'value' => function($data) {
                    return '<div style="overflow: scroll; width: 400px; height: 300px">' . $data->historyDialog . '</div>';
                }
            ]
        ],
    ]) ?>
    <style type="text/css">
        .content-data {
            width: 400px;
            height: 300px;
            overflow: scroll !important;

        }
    </style>

</div>
