<?php


use forma\modules\product\records\Category;
use forma\modules\product\records\FieldValue;
use kartik\select2\Select2;
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

<?php //if (Yii::$app->request->isAjax) {
//    Yii::$app->controller->layout = false;
//    Pjax::begin();
//} ?>


<?php $form = ActiveForm::begin([
    'id' => 'category-name-form',
]); ?>

<div class="col-md-3 block">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?php Pjax::begin() ?>

    <?php
    $categories = Category::find()
        ->joinWith(['accessory'])
        ->where(['accessory.user_id' => Yii::$app->getUser()->getId()])
    ->andWhere(['accessory.entity_class' => Category::className()]);

    if (isset($subCategoriesId) && !empty($subCategoriesId)) {
        foreach ($subCategoriesId as $subCategoryId) {
            $categories =  $categories->andWhere(['<>', 'category.id', $subCategoryId]);
        }
    }

    if (!is_null($model->id)) {
        $currentCategoryId = $model->id;
        $categories = $categories->andWhere(['<>', 'category.id', $currentCategoryId]);
    }
    $categories = $categories->all();

    $arrayCategories = ArrayHelper::map(
        $categories, 'id', 'name');

    echo $form->field($model, 'parent_id')->dropDownList(
        $arrayCategories,
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
    );

    ?>

    <?php Pjax::end() ?>
    <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>
<div class="col-md-9 block">
    <?php Pjax::begin(['id' => 'pjax-drop-down-list-category', 'enablePushState' => false,]); ?>

    <?php

    if (isset($searchParentField) && isset($parentFieldDataProvider)) {
//        de('dwa');
        $thisParentGrid = true;
        echo 'Характеристики родительской категории';
        echo $this->render('setting_widget', [
            'thisParentGrid' => $thisParentGrid,
            'searchModel' => $searchParentField,
            'dataProvider' => $parentFieldDataProvider,
        ]);
    }
    ?>
    <?php Pjax::end(); ?>


    <?php if (isset($model->id)) {

        echo 'Характеристики текущей категории';
        echo $this->render('setting_widget', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

        echo $this->render('add_attribute', [
            'model' => $model,
            'field' => $field,
        ]);
    } ?>
</div>

<?php //if (Yii::$app->request->isAjax) {
//    Pjax::end();
//} ?>
