<?php

use forma\modules\purchase\records\purchase\Purchase;
use forma\modules\supplier\records\Supplier;
use forma\modules\warehouse\records\Warehouse;
use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use forma\components\widgets\ModalCreate;
use yii\helpers\Url;
use \forma\modules\purchase\records\purchase\StateConfirm;
use forma\modules\core\widgets\DetachedBlock;


/**
 * @var Purchase $model
 */

?>

<?php

Pjax::begin(['id' => 'purchase-form-pjax', 'enablePushState' => false]);

?>

<?php DetachedBlock::begin([
    'example' => 'Укажите данные операции',
]); ?>

<div class="operation-form">

    <?php

    $formOptions = [
        'action' => Url::to(['/purchase/form/save', 'id' => $model->id]),
        'options' => ['data-pjax' => '1'],
        'enableClientValidation' => true,
        'fieldConfig' => [
            'inputOptions' => [
                'class' => 'form-control',
                'disabled' => $model->stateIs(new StateConfirm()),
            ],
        ],
    ];

    $form = ActiveForm::begin($formOptions);

    ?>


    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'warehouse_id', [
                'feedbackIcon' => [
                    'prefix' => 'fa fa-',
                    'default' => 'home',
                    'success' => 'check-square-o',
                    'error' => 'minus-square',
                    'defaultOptions' => ['class' => 'text-muted'],
                ],
            ])->dropDownList(Warehouse::getList(), ['prompt' => '']) ?>
        </div>

        <div class="col-md-6">
            <?php

            $supplierSelectOptions = [
                'feedbackIcon' => [
                    'prefix' => 'fa fa-',
                    'default' => 'truck',
                    'success' => 'check-square-o',
                    'error' => 'minus-square',
                    'defaultOptions' => ['class' => 'text-muted'],
                ],
            ];
            if (!$model->stateIs(new StateConfirm())) {
                $supplierSelectOptions = array_merge($supplierSelectOptions, [
                    'addon' => [
                        'prepend' => [
                            'content' => ModalCreate::widget(['route' => Url::to(['/supplier/supplier/create'])]),
                            'asButton' => true,
                        ],
                    ],
                ]);
            }
            ?>
            <?= $form->field($model, 'supplier_id', $supplierSelectOptions)->dropDownList(Supplier::getList()); ?>
            <?php if(isset($_GET['needSupplier'])) : ?>
            <div>
                <p style="color: red; margin: 0">Необходимо заполнить "Поставщик"</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'date_create', [
                'feedbackIcon' => [
                    'prefix' => 'fa fa-',
                    'default' => 'calendar',
                    'success' => 'check-square-o',
                    'error' => 'minus-square',
                    'defaultOptions' => ['class' => 'text-muted'],
                ],
                'inputOptions' => ['disabled' => '1', 'value' =>
                    date('d.m.Y H:i:s', strtotime($model->date_create)),
                ],
            ]) ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'date_complete', [
                'feedbackIcon' => [
                    'prefix' => 'fa fa-',
                    'default' => 'calendar-check-o',
                    'success' => 'check-square-o',
                    'error' => 'minus-square',
                    'defaultOptions' => ['class' => 'text-muted'],
                ],
                'inputOptions' => ['disabled' => '1', 'value' =>
                    $model->date_complete ?
                        date('d.m.Y H:i:s', strtotime($model->date_complete)) : '',
                ],
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'name', [
                'feedbackIcon' => [
                    'prefix' => 'fa fa-',
                    'default' => 'pencil',
                    'success' => 'check-square-o',
                    'error' => 'minus-square',
                    'defaultOptions' => ['class' => 'text-muted'],
                ],
            ]) ?>
        </div>
    </div>

    <?php if (!$model->stateIs(new StateConfirm())): ?>
        <div class="row">
            <div class="col-md-12 form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    <?php endif; ?>

    <?php ActiveForm::end(); ?>

</div>

<?php DetachedBlock::end(); ?>

<?php Pjax::end() ?>

<?= Modal::widget([
    'id' => 'modal-create',
    'toggleButton' => false,
]) ?>
