<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\date\DatePicker;
use kartik\time\TimePicker;
use vova07\imperavi\Widget;

/* @var $this yii\web\View */
/* @var $model forma\modules\event\records\Event */
/* @var $form yii\widgets\ActiveForm */
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


<div class="event-form" >
    <?php \yii\widgets\Pjax::begin(['id' => 'create-event']); ?>
    <?php $form = ActiveForm::begin([
        'options' => [
            'data-pjax' => 1
        ]
    ]); ?>

    <div class="row">
        <input type="hidden" name="close" value="close">
        <?php if (isset($_GET['name'])): ?>
            <div class="col-xs-12"><?= $form->field($model, 'name')->textInput(['value'=>$_GET['name']]) ?></div>
        <?php else: ?>
            <div class="col-xs-12"><?= $form->field($model, 'name')->textInput() ?></div>
        <?php endif; ?>
        <div class="col-xs-6"><?= $form->field($model, 'event_type_id')->textInput() ?></div>
        <div class="col-xs-6"><?= $form->field($model, 'status')->textInput() ?></div>
    </div>
    <div class="col-xs-12">
        <?= $form->field($model, 'text')->widget(Widget::className(), [
            'settings' => [
                'lang' => 'ru',
                'minHeight' => 200,]]); ?>
    </div>
    <div>
        <?php if(isset($_GET['date_from']) && isset($_GET['start_time'])): ?>
            <?php $model->date_from = $_GET['date_from'] ?>
            <div class="col-xs-6">
                <?= $form->field($model, 'date_from')->textInput()->widget(DatePicker::className(),[
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd' ,
                    ], 'options' => ['style' => 'left: 0']])?>
            </div>
            <div class="col-xs-6">
                <?php $model->start_time = $_GET['start_time'] ?>
                <?= $form->field($model, 'start_time')->textInput()->widget(TimePicker::className(), ['pluginOptions' => [
                    'format' => 'HH:mm:ss',
                    'showSeconds' => true,
                    'showMeridian' => false,
                    'minuteStep' => 1,
                    'secondStep' => 5,
                ]]) ?></div>
        <?php else: ?>
        <div class="col-xs-6"> <?= $form->field($model, 'date_from')->textInput()->widget(DatePicker::className(),[
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true
                ]]) ?></div>
        <div class="col-xs-6"><?= $form->field($model, 'start_time')->textInput()->widget(TimePicker::className(),['name' => 't1',
                'pluginOptions' => [
                    'format' => 'HH:mm:ss',
                    'showSeconds' => true,
                    'showMeridian' => false,
                    'minuteStep' => 1,
                    'secondStep' => 5,
                ]])?></div>
    </div>
<?php endif; ?>
    <div>
        <?php if (isset($_GET['date_to']) && isset($_GET['end_time'])): ?>
            <div class="col-xs-6">
                <?php $model->date_to = $_GET['date_to'] ?>
                <?= $form->field($model, 'date_to')->textInput()->widget(DatePicker::className(),[
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd' ,
                    ]]) ?></div>
            <div class="col-xs-6">
                <?php $model->end_time = $_GET['end_time'] ?>
                <?= $form->field($model, 'end_time')->textInput()->widget(TimePicker::className(), ['pluginOptions' => [
                    'format' => 'HH:mm:ss',
                    'showSeconds' => true,
                    'showMeridian' => false,
                    'minuteStep' => 1,
                    'secondStep' => 5,
                ]]) ?></div>
        <?php else: ?>
        <div class="col-xs-6"><?= $form->field($model, 'date_to')->textInput()->widget(DatePicker::className(),[
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd' ,
                ]]) ?></div>
        <div class="col-xs-6"><?= $form->field($model, 'end_time')->textInput()->widget(TimePicker::className(),['name' => 't1',
                'pluginOptions' => [
                    'format' => 'HH:mm:ss',
                    'showSeconds' => true,
                    'showMeridian' => false,
                    'minuteStep' => 1,
                    'secondStep' => 5,
                ]]) ?></div>
    </div>

<?php endif; ?>

<div class="col-xs-12 col-md-12">
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ?'<i class="fa fa-save"></i>'.' '. 'Добавить' : '<i class="fa fa-save"></i>'.' '.'Изменить',
            ['class' => $model->isNewRecord ? 'btn btn-success btn-lg btn-block' : 'btn btn-success btn-lg btn-block',2]) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
<?php \yii\widgets\Pjax::end(); ?>
</div>