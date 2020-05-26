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
]); ?>

<div class="col-md-3 block">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?php Pjax::begin() ?>

    <?php
    $categoryIdDropDownList = $model->id;
    if (is_null($model->id)){
        $categoryIdDropDownList = 0;
    }
    echo $form->field($model, 'parent_id')->dropDownList(ArrayHelper::map(
        \forma\modules\product\records\Category::find()
            ->joinWith(['accessory'])
            ->where(['accessory.user_id' => Yii::$app->getUser()->getId()])
            ->andWhere(['<>' , 'category.id',$categoryIdDropDownList])
            ->all(), 'id', 'name'),
        ['prompt' => '', 'onchange' => "$.pjax({         
                             type : 'POST',         
                             url : '/product/category/pjax-parent-category-field',
                             container: '#pjax-drop-down-list-category',         
                             data :  $(this).serialize(), 
                             push: false,
                             replace: false,         
                             timeout: 10000,         
                             \"scrollTo\" : false     
                      })",]
    ) ?>
    <?php Pjax::end() ?>
    <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>


</div>


<?php ActiveForm::end(); ?>
<div class="col-md-9 block">
<?php Pjax::begin(['id' => 'pjax-drop-down-list-category', 'enablePushState' => false,]); ?>
<?php

if (isset($searchParentField) && isset($parentFieldDataProvider)): ?>
    <?= $this->render('parent_field', [
        'searchParentField' => $searchParentField,
        'parentFieldDataProvider' => $parentFieldDataProvider,
    ]);?>
<?php endif; ?>
<?php Pjax::end(); ?>



<?php if (isset($model->id)): ?>

    <?= $this->render('setting_widget', [
        'model' => $model,
        'field' => $field,
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
    ]) ?>

<?php endif; ?>
</div>
<?php if (Yii::$app->request->isAjax) {
    Pjax::end();
} ?>
