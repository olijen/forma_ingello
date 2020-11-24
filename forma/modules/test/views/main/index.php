<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;


$this->title = 'Список типов тестов';
?>
<div class="form-group">
    <?php $form = ActiveForm::begin(['action'=>'/test/main/create','method'=>'post']); ?>

    <div class="form-group">
        <?= Html::submitButton('+ Создать тип', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<?php echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' =>$searchModel,
    'columns'=>[
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'name',
        'link',
        'user_id',
        ['class'=>'yii\grid\ActionColumn'],
    ],
]);?>
