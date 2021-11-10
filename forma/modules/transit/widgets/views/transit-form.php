<?php

use forma\modules\transit\records\transit\Transit;
use yii\widgets\Pjax;
use yii\helpers\Url;
use kartik\form\ActiveForm;
use yii\helpers\Html;
use forma\modules\warehouse\records\Warehouse;
use forma\modules\transit\records\transit\StateConfirm;
use forma\modules\core\widgets\DetachedBlock;

/**
 * @var Transit $model
 */

Pjax::begin(['id' => 'transit-form-pjax', 'enablePushState' => false, 'enableReplaceState' => false]);

?>

<?php DetachedBlock::begin([
    'example' => 'Укажите данные операции',
]); ?>

<div class="operation-form">

    <?php

    $formOptions = [
        'action' => Url::to(['/transit/form/save', 'id' => $model->id]),
        'options' => ['data-pjax' => '1'],
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
            <?= $form->field($model, 'from_warehouse_id', [
                'feedbackIcon' => [
                    'prefix' => 'fa fa-',
                    'default' => 'home',
                    'success' => 'check-square-o',
                    'error' => 'minus-square',
                    'defaultOptions' => ['class'=>'text-muted'],
                ],
            ])
                ->dropDownList(Warehouse::getList(), ['prompt' => '']) ?>
        </div>
        <?php
        $modelToTransit = new Transit();
        if(!empty($_GET['warehouse_id'])){
            $modelToTransit->to_warehouse_id = $_GET['warehouse_id'];
        }
        ?>
        <div class="col-md-6">
            <?= $form->field($modelToTransit, 'to_warehouse_id', [
                'feedbackIcon' => [
                    'prefix' => 'fa fa-',
                    'default' => 'home',
                    'success' => 'check-square-o',
                    'error' => 'minus-square',
                    'defaultOptions' => ['class'=>'text-muted'],
                ],
            ])
                ->dropDownList(Warehouse::getList(false), ['prompt' => '']) ?>
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
                    'defaultOptions' => ['class'=>'text-muted'],
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
                    'defaultOptions' => ['class'=>'text-muted'],
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
                    'defaultOptions' => ['class'=>'text-muted'],
                ],
            ]) ?>
        </div>
    </div>

    <?php if (!$model->stateIs(new StateConfirm())): ?>
        <div class="row">
            <div class="col-md-12 form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success' ]) ?>
            </div>
        </div>
    <?php endif; ?>

    <?php ActiveForm::end(); ?>

</div>

<?php DetachedBlock::end(); ?>

<?php Pjax::end() ?>
