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
    <?= Html::dropDownList('strategy', 'null', \yii\helpers\ArrayHelper::map((new \forma\modules\selling\records\strategy\StrategySearch())->createQuery()->all(), 'id', 'name'),
        [
            'required' => 'true',
            'class' => 'form-control'
        ]) ?>
    <br>Выберите запрос\вопрос\кейс <br>
    <?= $form->field($model, 'request_id')
        ->textInput()
        ->dropDownList(\yii\helpers\ArrayHelper::map((new \forma\modules\selling\records\talk\RequestSearch())->createQuery()->all(), 'id', 'text'))
    ?>
    <br> <b>Или</b> создайте новый запрос\вопрос\кейс <br>
    <input type="text" name="request" class="form-control" />
    <div class="form-group field-request-is_manager">

        <input type="hidden" name="Request[is_manager]" value="0"><label><input type="checkbox" id="request-is_manager" name="Request[is_manager]" value="1"> Вопрос от менеджера</label>

        <div class="help-block"></div>
    </div>
    <br>
    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Создать') : Yii::t('app', 'Обновить'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
