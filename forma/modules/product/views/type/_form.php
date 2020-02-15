<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model forma\modules\product\records\Type */
/* @var $form yii\widgets\ActiveForm */
?>

<?php if (Yii::$app->request->isAjax) {
    Yii::$app->controller->layout = false;
    Pjax::begin();
} ?>

<div class="type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?php if (Yii::$app->request->isAjax): ?>
            <?= \forma\components\widgets\ModalCreateButton::widget([
                'route' => Url::toRoute('/product/type/create'),
                'selectId' => 'product-type_id',
            ]) ?>
        <?php else: ?>
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?php endif; ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php if (Yii::$app->request->isAjax) {
    Pjax::end();
} ?>

