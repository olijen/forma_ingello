<?php

use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\bootstrap\Html as Bootstrap;
use kartik\select2\Select2;
use yii\helpers\Url;
use forma\modules\product\records\PackUnit;

$js = <<<JS
    $('document').ready(function() {
        $('#packs-units-pjax')
        .on('pjax:success', function(xhr, textStatus, error, options) {
            alert('Packs-units saved');
        });
    });
JS;

$this->registerJs($js);

?>

<div class="row">
    <div class="col-xs-12 text-center">
        <div class="panel panel-default">
            <div class="panel-heading">Units</div>
            <div class="panel-body">
                <?php if ($model->isNewRecord): ?>

                    'Can not add units for new record';

                <?php else: ?>

                    <?php Pjax::begin([
                        'id' => 'packs-units-pjax',
                        'enablePushState' => false,
                        'enableReplaceState' => false,
                    ]); ?>

                    <?php $form = ActiveForm::begin([
                        'action' => Url::to(['/product/product/add-packs-units']),
                        'options' => ['data-pjax' => true],
                    ]); ?>

                    <?= $form->field($model, 'id')->hiddenInput()->label(false) ?>

                    <?= $form->field($model, 'packUnits')->widget(Select2::classname(), [
                        'data' => PackUnit::getList(),
                        'options' => [
                            'placeholder' => 'Select a unit ...',
                            'multiple' => true,
                        ],
                        'pluginOptions' => [
                            'tags' => true,
                        ],
                        'addon' => [
                            'append' => [
                                'content' => Html::submitButton(Bootstrap::icon('ok'), [
                                    'class' => 'btn btn-success',
                                ]),
                                'asButton' => true,
                            ],
                        ],
                    ])->label(false) ?>

                    <?php ActiveForm::end(); ?>

                    <?php Pjax::end(); ?>

                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
