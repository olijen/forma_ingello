<?php

use kartik\form\ActiveForm;
//use yii\widgets\ActiveForm;  TODO в чем разница???
use kartik\switchinput\SwitchInput;
use yii\helpers\Html;

use forma\components\widgets\ModalCreate;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use forma\modules\product\records\Product;
use kartik\select2\Select2;
use forma\modules\product\records\PackUnit;
use forma\modules\core\widgets\DetachedBlock;
use forma\modules\product\records\Type;
use forma\modules\product\records\Manufacturer;
use yii\web\View;
use forma\modules\product\records\Category;
use kartik\color\ColorInput;
use forma\modules\product\records\Color;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model forma\modules\product\records\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $this->registerJsFile('/js/common.js', ['position' => View::POS_END]); ?>


<div class="product-form">

    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
        <div class="col-md-6">

            <?php DetachedBlock::begin(['example' => 'Общее']) ?>

            <?= $form->field($model, 'type_id')->widget(Select2::className(), [
                'data' => Type::getList(),
                'options' => ['placeholder' => 'У каждого типа своя форма.'],
                'addon' => ['prepend' => [
                    'content' => ModalCreate::widget(['route' => Url::to(['/product/type/create'])]),
                    'asButton' => true,
                ]],
            ])
            ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'manufacturer_id')->widget(Select2::className(), [
                'data' => Manufacturer::getList(),
                'options' => ['class' => 'form-control', 'placeholder' => 'Выберите производителя ...'],
                'addon' => ['prepend' => [
                    'content' => ModalCreate::widget(['route' => Url::to(['/product/manufacturer/create'])]),
                    'asButton' => true,
                ]],
            ]) ?>

            <?= $form->field($model, 'sku', ['enableClientValidation' => false])->textInput(['maxlength' => true, 'readonly' => true]) ?>

            <?= $form->field($model, 'rating')->widget(\kartik\rating\StarRating::className(), [
                'pluginOptions' => [
                    'stars' => 10,
                    'max' => 10,
                    'step' => 1,
                    'theme' => 'krajee-uni',
                ],
            ]) ?>

            <?= $form->field($model, 'note')->textarea(['style' => 'resize:none;']) ?>

            <?php DetachedBlock::end() ?>


        </div>
        <div class="col-md-6">
            <?php DetachedBlock::begin() ?>

            <?php
            if (isset($_GET['id'])): ?>
                <?= $form->field($model, 'category_id', [
                    'addon' => [
                        'prepend' => [
                            'asButton' => true,
                            'content' => ModalCreate::widget(['route' => Url::to(['/product/category/create'])]),
                        ],
                    ],
                ])->textInput(['disabled' => true, 'value' => $model->category->name]) ?>
            <?php else: ?>
                <?= $form->field($model, 'category_id')->widget(Select2::className(), [
                    'data' => Category::getList(),
                    'options' => ['placeholder' => '', 'class' => 'form-control'],
                    'pluginEvents' => [
                        "select2:select" => "function() {
                            $.pjax({         
                                   type : 'POST',         
                                   url : '/product/product/pjax-attribute',
                                   container: '#ajax-attributes',         
                                   data :  $(this).serialize(), 
                                   push: false,
                                   replace: false,         
                                   timeout: 10000,         
                                   \"scrollTo\" : false     
                            })
                     }",
                    ],
                ]) ?>
            <?php endif; ?>



            <?php
            Pjax::begin(['id' => 'ajax-attributes',]);
            ?>
            <?php if (isset($category_id)):?>
                <?= $this->render('pjax_attribute', [
                    'field' => $field,
                    'category_id' => $category_id,
                    'fieldAttributes' => $fieldAttributes,
                ]);?>
            <?php else:?>

            <?= $this->render('pjax_attribute', [
            'field' => $field,
            'fieldAttributes' => $fieldAttributes,
            ]);?>
            <?php endif;?>
            <?php Pjax::end();
            DetachedBlock::end(); ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Сохранить изменения' : 'Сохранить изменения', ['class' => $model->isNewRecord ? 'btn btn-success btn-block' : 'btn btn-primary btn-block']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>


<?= Modal::widget([
    'id' => 'modal-create',
    'toggleButton' => false,
]) ?>
