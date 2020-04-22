<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model forma\modules\product\records\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<?php if (Yii::$app->request->isAjax) {
    Yii::$app->controller->layout = false;
    Pjax::begin();
} ?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_id')->dropDownList(
        \forma\modules\product\records\Category::getList(),
        ['prompt' => '']
    ) ?>

    <div class="form-group">
        <?php if (Yii::$app->request->isAjax): ?>
            <?= \forma\components\widgets\ModalCreateButton::widget([
                'route' => Url::toRoute('/product/category/create'),
                'selectId' => 'product-category_id',
            ]) ?>
        <?php else: ?>
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
        <?php endif; ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php if (Yii::$app->request->isAjax) {
    Pjax::end();
} ?>
