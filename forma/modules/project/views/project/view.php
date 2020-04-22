<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model forma\modules\project\records\project\Project */

$this->title = $model->name;
$this->params['homeLink'] = ['label' => 'Панель упраления', 'url' => '/hr', 'title' => 'Панель управления модулем найма'];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Проекты'), 'url' => ['index']];

\yii\web\YiiAsset::register($this);
?>
<div class="project-view">


    <p>
        <?= Html::a(Yii::t('app', 'Редактировать'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
            'name',
            'address',
            [
                'attribute' => 'description',
                'format' => 'html',
                'value' => function($data){
                    return '<div class="col-md-12 content-data">' .  str_replace( '<img', '<img style="max-width: 400px; max-height: 200px" ',  $data->description ) . '</div>';
                }
            ],
        ],
    ]) ?>
    <style type="text/css">
        .content-data {
            width: 400px;
            height: 300px;
            overflow: scroll !important;

        }
    </style>

    <div class="row">
        <div class="col-md-6">
        <?php \forma\modules\core\widgets\DetachedBlock::begin(['example' => 'Вакансии'])?>
            <ul class="list-group">
                <?php
                $vacacount = 0;
                    foreach ($model->projectVacancies as $projectVacancy)
                    $vacacount += $projectVacancy->count;

                ?>
                <li class="list-group-item list-group-item-action list-group-item-success text-center">Вакансии на проект(<?=$vacacount?>)</li>
            </ul>
            <ul class="list-group" style="overflow: scroll; height: 400px">
            <?php foreach($model->vacancies as $vacancy):?>
                <?php
                    $count = 0;
                    foreach ($vacancy->projectVacancies as $projectVacancy) {
                        $count = $projectVacancy->count;
                    }
                ?>
                <li class="list-group-item list-group-item-action list-group-item-success">
                    Название: <a href="/vacancy/vacancy/view?id=<?=$vacancy->id ?>"><?=$vacancy->name ?></a> (<?=$count?>)
                </li>
            <?php endforeach;?>
            </ul>
            <?=Html::a('Добавить вакансию', \yii\helpers\Url::to(['/project/project-vacancy/create', 'id' => $model->id]), ['class' => 'btn btn-success']) ?>
        <?php \forma\modules\core\widgets\DetachedBlock::end()?>
        </div>
        <div class="col-md-6">
            <?php \forma\modules\core\widgets\DetachedBlock::begin(['example' => 'Кандидаты']) ?>
            <ul class="list-group">
                <li class="list-group-item list-group-item-action list-group-item-danger text-center">Кандидаты и сотрудники(<?=count($model->getInterviews()->all())?>)</li>
            </ul>
            <ul class="list-group" style="overflow: scroll; height: 400px">

                <?php foreach($model->getInterviews()->all() as $interview):?>
                    <?php if (!empty($interview->worker)): ?>
                        <li class="list-group-item list-group-item-action list-group-item-danger">
                            Имя: <a href="/worker/worker/view?id=<?=$interview->worker->id?>"><?=$interview->worker->name ?> <?=$interview->worker->surname ? $interview->worker->surname : null ?> <?=$interview->worker->getStatus()?></a>
                        </li>
                    <?php endif; ?>
                <?php endforeach;?>
            </ul>
            <?php \forma\modules\core\widgets\DetachedBlock::end() ?>
        </div>

    </div>
</div>
