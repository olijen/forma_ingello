<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
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

/* @var $this yii\web\View */
/* @var $model forma\modules\product\records\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $this->registerJsFile('/js/common.js', ['position' => View::POS_END]); ?>

<?php $form = ActiveForm::begin(['id' => 'product-product-form']); ?>

<?= $form->field($model, 'type_id')->widget(Select2::className(), [
    'data' => Type::getList(),
    'options' => ['placeholder' => 'У каждого типа своя форма.'],
    'addon' => ['prepend' => [
        'content' => ModalCreate::widget(['route' => Url::to(['/product/type/create'])]),
        'asButton' => true,
    ]],
])
?>

<?php DetachedBlock::begin(['example' => 'Общее']) ?>

<div class="product-form">

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'manufacturer_id')->widget(Select2::className(), [
        'data' => Manufacturer::getList(),
        'options' => ['class' => 'form-control', 'placeholder' => 'Выберите производителя ...'],
        'addon' => ['prepend' => [
            'content' => ModalCreate::widget(['route' => Url::to(['/product/manufacturer/create'])]),
            'asButton' => true,
        ]],
    ]) ?>

    <?= $form->field($model, 'year_chart')->textInput() ?>

    <?php if ($model->isOriginal()): ?>

        <div class="row">
            <div class="col-xs-12 text-center">
                <div class="panel panel-default">
                    <div class="panel-heading">Единицы измерения.</div>
                    <div class="panel-body">

                        <?= $form->field($model, 'packUnits')->widget(Select2::className(), [
                            'data' => PackUnit::getList(),
                            'options' => [
                                'placeholder' => 'Select a unit ...',
                                'multiple' => true,
                            ],
                            'pluginOptions' => [
                                'tags' => true,
                            ],
                        ])->label(false) ?>

                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>

    <?= $form->field($model, 'volume')->dropDownList(Product::getVolumesList(), ['prompt' => '']) ?>

    <?= $form->field($model, 'proof')->textInput() ?>

    <?= $form->field($model, 'batcher')->dropDownList(Product::getBatchersList(), ['prompt' => '']) ?>

<?php DetachedBlock::end() ?>

<?php DetachedBlock::begin() ?>

    <?= $form->field($model, 'sku', ['enableClientValidation' => false])->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <?= $form->field($model, 'rating')->widget(\kartik\rating\StarRating::className(), [
        'pluginOptions' => [
            'stars' => 10,
            'max' => 10,
            'step' => 1,
            'theme' => 'krajee-uni',
        ],
    ]) ?>

    <?= $form->field($model, 'category_id')->widget(Select2::className(), [
        'data' => Category::getList(),
        'options' => ['placeholder' => 'Select a category ...'],
        'addon' => ['prepend' => [
            'content' => ModalCreate::widget(['route' => Url::to(['/product/category/create'])]),
            'asButton' => true,
        ]],
    ]) ?>

    <?= $form->field($model, 'customs_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'note')->textarea(['style' => 'resize:none;']) ?>

    <?= $form->field($model, 'color')->widget(ColorInput::className(), [
        'showDefaultPalette' => false,
        'options' => [
            'placeholder' => 'Select a color ...',
            'value' => $model->color ? $model->color->name : null,
        ],
        'pluginOptions' => [
            'showInput' => true,
            'showInitial' => true,
            'showPalette' => true,
            'showPaletteOnly' => true,
            'showSelectionPalette' => true,
            'showAlpha' => false,
            'preferredFormat' => 'name',
            'palette' => Color::getPallet(),
        ],
    ]); ?>

    <?= $form->field($model, 'country_id')->widget(kartik\select2\Select2::className(), [
        'data' => \forma\modules\country\records\Country::getList(),
        'options' => ['placeholder' => 'Select a country ...'],
        'addon' => ['prepend' => [
            'content' => ModalCreate::widget(['route' => Url::to(['/country/country/create'])]),
            'asButton' => true,
        ]],
    ])
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

</div>

<?php DetachedBlock::end() ?>

<?php ActiveForm::end(); ?>

<?= Modal::widget([
    'id' => 'modal-create',
    'toggleButton' => false,
]) ?>
