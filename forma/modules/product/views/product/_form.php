<?php

use forma\modules\core\components\LinkHelper;
use kartik\form\ActiveForm;
//use yii\widgets\ActiveForm;  TODO в чем разница???
use kartik\switchinput\SwitchInput;
use vova07\imperavi\Widget;
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

<?php $form = ActiveForm::begin(['id' => 'product-product-form']); ?>
<div class="product-form">

    <div class="row">

        <div class="col-md-6">

            <?php DetachedBlock::begin(['example' => 'Общее']) ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'manufacturer_id')->widget(Select2::className(), [
                'data' => Manufacturer::getList(),
                'options' => ['class' => 'form-control', 'placeholder' => 'Выберите производителя ...'],
                'addon' => [
                    'prepend' => [
                        'content' => ModalCreate::widget(['route' => '/product/manufacturer/create']),
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

            <?= $form->field($model, 'note')->widget(Widget::className(), [
                'settings' => [
                    'lang' => 'ru',
                    'minHeight' => 200,
                    'plugins' => [
                        'clips',
                        'fullscreen',
                        'imagemanager',
                        'filemanager',
                    ],
                    'clips' => [
                        ['Lorem ipsum...', 'Lorem...'],
                        ['red', '<span class="label-red">red</span>'],
                        ['green', '<span class="label-green">green</span>'],
                        ['blue', '<span class="label-blue">blue</span>'],
                    ],
                    'imageUpload' => '/worker/worker/file-upload', // \yii\helpers\Url::to(['/worker/worker/image-upload']),
                    'imageManagerJson' => '/worker/worker/file-upload', // \yii\helpers\Url::to(['/worker/worker/images-get']),
                    'fileManagerJson' => '/worker/worker/file-upload', // \yii\helpers\Url::to(['/worker/worker/files-get']),
                    'fileUpload' => '/worker/worker/file-upload' //\yii\helpers\Url::to(['/worker/worker/file-upload'])
                ],
            ]); ?>

            <?php DetachedBlock::end() ?>

        </div>
        <div class="col-md-6">
            <?php DetachedBlock::begin() ?>

            <?php

                echo $form->field($model, 'category_id')->widget(Select2::className(), [
                    'data' => Category::getList(),
                    'options' => ['placeholder' => 'Выберите категорию...', 'class' => 'form-control'],
                    'addon' => [
                        'prepend' => [
                            'asButton' => true,
                            'content' => "
                                <a style=\"color: gray; display: flex; align-items: center; padding: 0 11px;\" href=\"javascript:void(0)\" class=\"btn btn-outline-secondary btn-xs\" type=\"button\" data-toggle=\"modal\" data-target=\"#modal\" onclick=\"$('#modal .modal-dialog .modal-content .modal-body').html(''); 
$('<iframe src= /product/category/create?without-header'
                        + ' style=width:100%;height:500px ' 
                        + 'frameborder=0 id=myFrame></iframe>')
                        .appendTo('#modal .modal-dialog .modal-content .modal-body');\">
                        <i class=\"fa fa-plus\" style='font-size: 15px;'></i></a>
                            ",
                        ],
                    ],
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


            <?php
            Pjax::begin(['id' => 'ajax-attributes',]);
            ?>
            <?php if (isset($category_id)): ?>
                <?= $this->render('pjax_attribute', [
                    'field' => $field,
                    'category_id' => $category_id,
                    'fieldAttributes' => $fieldAttributes,
                ]); ?>
            <?php else: ?>


                <?php
                $renderPjaxAttribute = ['field' => $field,];
                if (isset($fieldAttributes)) {
                    $renderPjaxAttribute = array_merge(['fieldAttributes' => $fieldAttributes,], $renderPjaxAttribute);
                }
                echo $this->render('pjax_attribute', $renderPjaxAttribute); ?>
            <?php endif; ?>
            <?php Pjax::end();
            DetachedBlock::end(); ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Сохранить изменения' : 'Сохранить изменения', ['class' => $model->isNewRecord ? 'btn btn-success btn-block' : 'btn btn-primary btn-block']) ?>
        </div>

    </div>
</div>
<?php ActiveForm::end(); ?>

<?= Modal::widget([
    'id' => 'modal-create',
    'toggleButton' => false,
]) ?>
