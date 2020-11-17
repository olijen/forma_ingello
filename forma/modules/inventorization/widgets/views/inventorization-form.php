<?php

use yii\widgets\Pjax;
use forma\modules\core\widgets\DetachedBlock;
use kartik\form\ActiveForm;
use yii\helpers\Url;
use forma\modules\inventorization\services\InventorizationService;
use yii\helpers\Html;
use forma\modules\inventorization\records\StateConfirm;

/**
 * @var $model \forma\modules\inventorization\records\Inventorization
 */

?>

<?php

Pjax::begin(['id' => 'inventorization-form-pjax', 'enablePushState' => false]);

if (!Yii::$app->request->isPjax) {
    $js = <<<JS
        $("document").ready(function() {
            $("#inventorization-form-pjax").on("pjax:complete", function(xhr, textStatus, error, options) {
                $.pjax.reload({container: '#inventorization-table-pjax'});
            });
        });
JS;
    $this->registerJs($js);
}

?>

<?php DetachedBlock::begin(); ?>

<div class="operation-form">
    <?php

    $formOptions = [
        'action' => Url::to(['/inventorization/form/save', 'id' => $model->id]),
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
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'warehouse_id', [
            'feedbackIcon' => [
                'prefix' => 'fa fa-',
                'default' => 'home',
                'success' => 'check-square-o',
                'error' => 'minus-square',
                'defaultOptions' => ['class'=>'text-muted'],
            ]
            ])->dropDownList(\forma\modules\warehouse\records\Warehouse::getList())?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'date', [
                'feedbackIcon' => [
                    'prefix' => 'fa fa-',
                    'default' => 'calendar-check-o',
                    'success' => 'check-square-o',
                    'error' => 'minus-square',
                    'defaultOptions' => ['class'=>'text-muted'],
                ],
                'inputOptions' => ['disabled' => '1', 'value' =>
                    $model->date ? date('d.m.Y H:i:s', strtotime($model->date)) : '',
                ],
            ])->label('Дата проведения') ?>
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
