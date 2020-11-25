<?php

use yii\helpers\Html;
use yii\grid\GridView;
use forma\modules\test\records\TestType;
use forma\modules\test\records\TestSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\test\records\TestTypeFieldSearch */
/* @var $model app\modules\test\records\TestType */
/* @var $dataProvider yii\data\ActiveDataProvider */


if (!empty($_GET['id'])){
    $id_test = $_GET['id'];

    $this->title = 'Создать тест для : id '.$id_test;
    $this->params['breadcrumbs'][] = $this->title;

}elseif (!empty($_GET['name'])){
    $name_test = $_GET['name'];
    $this->title = 'Создать тест для : '.$name_test;

    $this->params['breadcrumbs'][] = $this->title;
}else{
    $this->title = 'Создать тест для';
    $this->params['breadcrumbs'][] = $this->title;
}
?>
<div class="test-type-field-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if (!empty($_GET['id'])): ?>
    <p>
        <?= Html::a('Добавить вопрос', ['create?id='.$_GET['id']], ['class' => 'btn btn-success']) ?>
    </p>
    <?php else: ?>
    <p>
        <?= Html::a('Добавить вопрос', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php endif; ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'block_name',
            'label_name',
            'type',
            'value',
            'placeholder',
            'required',
           'test_id',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
