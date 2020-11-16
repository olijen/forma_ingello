<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\requeststrategy\RequestStrategy */
/* @var $form yii\widgets\ActiveForm */
?>
    
<div class="request-strategy-form">

    <?php $form = ActiveForm::begin();
    ?>

    <?= $form->field($model, 'request_id')->textInput()->dropDownList(\yii\helpers\ArrayHelper::map((new \forma\modules\selling\records\talk\RequestSearch())->createQuery()->all(), 'id', 'text')) ?>
    <?= $form->field($model, 'strategy_id')->textInput()->dropDownList(\yii\helpers\ArrayHelper::map((new \forma\modules\selling\records\strategy\StrategySearch())->createQuery()->all(), 'id', 'name')) ?>



    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
