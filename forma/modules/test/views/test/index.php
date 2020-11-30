<?php

use yii\helpers\Html;
use yii\grid\GridView;
use forma\modules\test\records\TestType;
use forma\modules\test\records\TestSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\test\records\TestTypeFieldSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

if (!empty($_GET['name'])){
    $name_test = $_GET['name'];
    $this->title = 'Создать вопрос для : '.$name_test;

    $this->params['breadcrumbs'][] = $this->title;
}else{
    $this->title = 'Создать вопрос';
    $this->params['breadcrumbs'][] = $this->title;
}
?>

<div class="test-type-field-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if (!empty($_GET['id'])): ?>
    <p>
        <?= Html::a('Добавить вопрос', ['test/create?id='.$_GET['id']], ['class' => 'btn btn-success']) ?>
    </p>
    <?php else: ?>
    <p>
        <?= Html::a('Добавить вопрос', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php endif; ?>
    <div>
        <div class="btn btn-lg">
            <a href="/test/main">Вернуться к списку</a>
        </div>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute'=>'id',
            'label'=>'Имя Теста'],

            ['attribute'=>'block_name',
            'label'=>'Имя Теста'],

            ['attribute'=>'label_name',
            'label'=>'Название'],

            ['attribute'=>'type',
            'label'=>'Тип поля'],

            ['attribute'=>'value',
                'label'=>'Значение'],
            ['attribute'=>'placeholder',
                'label'=>'Подсказка по полю'],

            ['attribute'=>'required',
                'label'=>'Обязательный'],

            ['attribute'=>'test_id',
                'label'=>'Уникальный инфедикатор теста'],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
