<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use forma\modules\test\records\TestType;

$this->title = 'Список типов тестов';
?>
<div class="form-group">
    <?php $form = ActiveForm::begin(['action'=>'/test/main/create','method'=>'post']); ?>

    <div class="form-group">
        <?= Html::submitButton('<i class="fa fa-plus"></i>'.' '.' Создать тип', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<?php echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' =>$searchModel,
    'columns'=>[
        ['class' => 'yii\grid\SerialColumn'],
        [
                'attribute'=>'name',
                'label'=>'Имя Теста',
        ],

        [
            'attribute'=>'link',
            'label'=>'Ссылка на тест',
            'value' => function ($data) {
                return Html::a('Пройти тест', Url::to(['test/test', 'id' => $data->id]));
            },
            'format' => 'raw',

        ],
        [
                'class'=>'yii\grid\ActionColumn',
                'template'=>'{delete} {update}',
        ],
    ],
]);?>
