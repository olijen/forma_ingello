<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\ItemInterface */
/* @var $form yii\widgets\ActiveForm */
$params = Yii::$app->params['access-interface'];
$modules = [];
foreach (array_keys($params) as $module) {
    $modules [$module] = $module;
}

if($model->hasErrors()):
\wokster\ltewidgets\BoxWidget::begin([
'solid'=>true,
'color'=>'danger',
'title'=>'Ошибки валидации',
'close'=> true,
]);
$error_data = $model->firstErrors;
echo \yii\widgets\DetailView::widget([
'model'=>$error_data,
'attributes'=>array_keys($error_data)
]);
\wokster\ltewidgets\BoxWidget::end();
endif;

?>

<div class="item-interface-form">

    <?php $form = ActiveForm::begin([
    ]); ?>
    <?= $form->field($model, 'rank_id', ['options' => ['class' => 'col-xs-12']])->dropDownList(
        \yii\helpers\ArrayHelper::map(\forma\modules\core\records\Rank::find()->select(['id', 'name'])->asArray()->all(), 'id', 'name')
    )->label('Ранг') ?>

    <?= $form->field($model, 'key', ['options' => ['class' => 'col-xs-12']])->dropDownList(
        $params
    )->label('Интерфейс') ?>

    <?= $form->field($model, 'module')->hiddenInput()->label(false) ?>

    <div class="col-xs-12 col-md-12">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<script>
    $('#iteminterface-key').change(function () {
        let values = document.querySelector('#iteminterface-key option:checked').parentElement.label
        $('#iteminterface-module').val(values)
    })
</script>
