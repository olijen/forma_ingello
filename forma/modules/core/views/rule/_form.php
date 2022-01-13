<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\Rule */
/* @var $form yii\widgets\ActiveForm */
$this->params['icons'][] = $icons;
$format = <<< SCRIPT
function format(icon) {
    let iconName = 'fa fa-'+icon.text;
    return "<i style='padding-right: 5px; font-size: 20px;' class='"+iconName+"' ></i>"+icon.text+"";
}
SCRIPT;
$escape = new \yii\web\JsExpression("function(m) { return m; }");
$this->registerJs($format, \yii\web\View::POS_HEAD);
if ($model->hasErrors()):
    \wokster\ltewidgets\BoxWidget::begin([
        'solid' => true,
        'color' => 'danger',
        'title' => 'Ошибки валидации',
        'close' => true,
    ]);
    $error_data = $model->firstErrors;
    echo \yii\widgets\DetailView::widget([
        'model' => $error_data,
        'attributes' => array_keys($error_data)
    ]);
    \wokster\ltewidgets\BoxWidget::end();
endif;

?>

<div class="rule-form">

    <?php $form = ActiveForm::begin([
    ]); ?>

    <?= $form->field($model, 'rule_name', ['options' => ['class' => 'col-xs-6']])->textInput() ?>

    <?= $form->field($model, 'action', ['options' => ['class' => 'col-xs-6']])->dropDownList(
        ['' => '', 'insert' => 'Вставить', 'update' => 'Обновить', 'delete' => 'Удалить']
    ) ?>

    <?= $form->field($model, 'table', ['options' => ['class' => 'col-xs-6']])->dropDownList(
        $tables
    ) ?>

    <?= $form->field($model, 'count_action', ['options' => ['class' => 'col-xs-6']])->textInput() ?>

    <?= $form->field($model, 'item_id', ['options' => ['class' => 'col-xs-6']])->dropDownList(
        $items
    )->label('Элемент') ?>
    <?= $form->field($model, 'rank_id', ['options' => ['class' => 'col-xs-6']])->dropDownList(
        \yii\helpers\ArrayHelper::map(\forma\modules\core\records\Rank::find()->select(['id', 'name'])->asArray()->all(), 'id', 'name')
    )->label('Ранг') ?>
    <?= $form->field($model, 'icon', ['options' => ['class' => 'col-xs-6']])->widget(kartik\select2\Select2::className(), [
        'data' => $icons,
        'options' => ['placeholder' => 'Выберите валюту ...'],
        'pluginOptions' => [
            'templateResult' => new \yii\web\JsExpression('format'),
            'templateSelection' => new \yii\web\JsExpression('format'),
            'escapeMarkup' => $escape,
            'allowClear' => true
        ],
    ])->label('Иконка') ?>


    <div class="col-xs-12 col-md-12">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
