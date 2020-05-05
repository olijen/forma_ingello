<?php

use forma\modules\selling\records\selling\Selling;
use yii\widgets\Pjax;
use kartik\form\ActiveForm;
use yii\helpers\Html;
use forma\modules\customer\records\Customer;
use forma\modules\warehouse\records\Warehouse;
use forma\modules\selling\records\selling\StateConfirm;
use yii\helpers\Url;
use forma\modules\core\widgets\DetachedBlock;

/**
 * @var Selling $model
 */

Pjax::begin(['id' => 'selling-form-pjax', 'enablePushState' => false]);

if (!Yii::$app->request->isPjax) {
$js = "
    $('document').ready(function() {
        $('#selling-form-pjax').on('pjax:complete', function(xhr, textStatus, error, options) {
            $.pjax.reload({container: '#selling-nomenclature-pjax'});
            krajeeDialog.alert('The changes have been saved');
        });
    });
";
$this->registerJs($js);
}

?>

<?php DetachedBlock::begin([
    'example' => 'Укажите данные операции',
]); ?>

<div class="operation-form">

    <?php

    $formOptions = [
        'action' => Url::to(['/selling/form/save', 'id' => $model->id]),
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
                ],
            ])->dropDownList(Warehouse::getList(), ['prompt' => '']) ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'customer_id', [
                'feedbackIcon' => [
                    'prefix' => 'fa fa-',
                    'default' => 'user-circle',
                    'success' => 'check-square-o',
                    'error' => 'minus-square',
                    'defaultOptions' => ['class'=>'text-muted'],
                ],
            ])->dropDownList(Customer::getList(), ['prompt' => '']) ?>
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

    <?php if (!$model->stateIs(new StateConfirm())): ?>
        <div class="row">
            <div class="col-md-12 form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success', 'id' => 'selling-form-submit-button']) ?>
                <?= Html::a('Позвонить', Url::to('strategy?id='.$model->id), ['class' => 'btn btn-success', 'id' => 'selling-talk'])?>
            </div>
        </div>
    <?php endif; ?>

    <?php ActiveForm::end(); ?>

</div>

<?php DetachedBlock::end(); ?>

<?php Pjax::end() ?>

<?php DetachedBlock::begin(['header' => 'История']); ?>
    <?= Html::Button('Ввести диалог', ['class' => 'btn btn-success',  'id' => 'openDialog']) ?>
    <div class="row hidden" id="dialog">

        <?php Pjax::begin(['enablePushState' => false]) ?>
            <?= $model->dialog ?>
            <?= $form = Html::beginForm(['talk/comment-history'], 'post', ['data-pjax' => '', 'class' => 'form-inline']); ?>
                <?= Html::textarea('comment', '', ['rows' => 5]) ?>
                <?= Html::input('hidden', 'id', $model->id, ['rows' => 5]) ?>
                <?= Html::submitButton('Добавить!')?>
            <?= Html::endForm() ?>
        <?php Pjax::end() ?>
    </div>
    <script>
        var flag = false;

        document.getElementById('openDialog').onclick = function () {
            if (flag === false) {
                document.getElementById('dialog').classList.remove('hidden');
                flag = true;
            } else {
                document.getElementById('dialog').classList.add('hidden');
                flag = false;
            }
        }
    </script>
<?php DetachedBlock::end() ?>
