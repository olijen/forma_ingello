<?php

use yii\helpers\Html;
use yii\grid\GridView;
use forma\modules\test\records\TestType;
use forma\modules\test\records\TestSearch;

/* @var $this yii\web\View */
/* @var $searchModel forma\modules\test\records\TestTypeFieldSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$model_name = new TestType();

if (!empty($_GET['name'])) {
    $name_test = $_GET['name'];
    $this->title = 'Создать вопрос для : ' . $name_test;

    $this->params['breadcrumbs'][] = $this->title;
} else {
    $this->title = 'Создать вопрос:';
    $this->params['breadcrumbs'][] = $this->title;
}
?>

<div class="test-type-field-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if (!empty($_GET['id'])): ?>
        <div style="float:left; height: 10px; width: auto">
            <p>
                <?= Html::a('<i class="fa fa-plus"></i>' . ' ' . 'Добавить вопрос', ['test/create?id=' . $_GET['id']], ['class' => 'btn btn-success']) ?>

            </p>
        </div>
    <?php else: ?>
        <div class="">
            <p>
                <?= Html::a('Добавить вопрос', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
    <?php endif; ?>
    <div>
        <div class="btn" style="margin-bottom: 30px ; margin-left: 1%">
            <a href="/test/main">Вернуться к списку</a>
        </div>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id',
                'label' => 'ID Теста'],

            ['attribute' => 'block_name',
                'label' => 'Блок вопросов'],

            ['attribute' => 'label_name',
                'label' => 'Название'],

            ['attribute' => 'type',
                'label' => 'Тип поля'],

            ['attribute' => 'value',
                'label' => 'Значение'],
            ['attribute' => 'placeholder',
                'label' => 'Подсказка по полю'],

            ['attribute' => 'required',
                'label' => 'Обязательный'],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function ($url = '/test/test/update?id=', $model) {
                        return Html::a('<span class="fa fa-check glyphicon glyphicon-pencil"></span>', '/test/test/update?id=' . $model->id, [
                            'title' => 'Редактировать',
                        ]);
                    },

                ],
            ],
        ],
    ]); ?>


</div>
