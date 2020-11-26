<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = 'Список типов тестов';
?>
<div class="form-group">
    <?php $form = ActiveForm::begin(['action'=>'/test/main/create','method'=>'post']); ?>

    <div class="form-group">
        <?= Html::submitButton('+ Создать тип', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
<a href="<?php echo $url = Url::toRoute(['test/test', 'id' => 39]);?>"> Ссылка на тест</a>
<?php echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' =>$searchModel,
    'columns'=>[
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute'=>'id',
            'label'=>'Индефикатор',
        ],
        [
                'attribute'=>'name',
                'label'=>'Имя Теста',

        ],
        [
            'attribute'=>'link',
            'label'=>'Ссылка на тест',
        ],
        [
            'attribute'=>'user_id',
            'label'=>'Индефикатор пользователя',
        ],
        ['class'=>'yii\grid\ActionColumn'],
    ],
]);?>
