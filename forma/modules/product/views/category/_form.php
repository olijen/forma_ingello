<?php

use forma\modules\product\records\FieldValue;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model forma\modules\product\records\Category */
/* @var $form yii\widgets\ActiveForm */
/* @var $searchModelValue */
/* @var $searchModel */
?>

<?php if (Yii::$app->request->isAjax) {
    Yii::$app->controller->layout = false;
    Pjax::begin();
} ?>



<?php $form = ActiveForm::begin([
    'id' => 'category-name-form',
//    'options' => ['class' => 'form-horizontal'],
]); ?>
<?php Pjax::begin() ?>
<div class="col-md-3 block">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_id')->dropDownList(
        \forma\modules\product\records\Category::getList(),
        ['prompt' => '']
    ) ?>

    <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>

    <div class="form-group">
        <!--            --><?php //if (Yii::$app->request->isAjax): ?>
        <!--                --><? //= \forma\components\widgets\ModalCreateButton::widget([
        //                    'route' => Url::toRoute('/product/category/create'),
        //                    'selectId' => 'product-category_id',
        //                ]) ?>
        <!--            --><?php //else: ?>
        <!--                --><? //= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
        <!--            --><?php //endif; ?>

    </div>
</div>
<?php Pjax::end() ?>
<?php ActiveForm::end(); ?>

<?php if ($model->id): ?>

    <?= $this->render('setting_widget', [
        'model' => $model,
        'field' => $field,
        'fieldValue' => $fieldValue,
        'searchModel' => $searchModel,
        'searchModelValue' => $searchModelValue,
        'dataProvider' => $dataProvider,
    ]) ?>

<?php endif; ?>

<?php if (Yii::$app->request->isAjax) {
    Pjax::end();
} ?>
