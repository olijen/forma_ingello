<?php


use yii\bootstrap\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\talk\Answer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="answer-form">

    <?php $form = ActiveForm::begin(); ?>
    К какой стратегии относится вопрос? <br>
    <?= Html::dropDownList('strategy', 'null', \yii\helpers\ArrayHelper::map(\forma\modules\selling\records\talk\Strategy::find()->all(), 'id', 'name'),
        [
            'required' => 'true',
            'class' => 'form-control'
        ]) ?>
    <br>Выберите запрос\вопрос\кейс <br>
    <?= $form->field($model, 'request_id')
        ->textInput()
        ->dropDownList(\yii\helpers\ArrayHelper::map(\forma\modules\selling\records\talk\Request::find()->all(), 'id', 'text'))
    ?>
    <br> <b>Или</b> создайте новый запрос\вопрос\кейс <br>
    <input type="text" name="request" class="form-control" />
    <br>
    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Создать') : Yii::t('app', 'Обновить'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
