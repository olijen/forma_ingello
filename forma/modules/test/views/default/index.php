<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;


$this->title = 'Список типов тестов';
?>
<div class="form-group">
    <?php $form = ActiveForm::begin(['action'=>'/test/main','method'=>'post']); ?>

    <div class="form-group">
        <?= Html::submitButton('+ Создать тип', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<?php GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' =>$searchModel,
    'columns'=>'',
]);?>
