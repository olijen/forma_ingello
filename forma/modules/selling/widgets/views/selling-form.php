<?php

use forma\modules\selling\records\selling\Selling;
use forma\modules\selling\records\selling\StateDone;
use yii\widgets\Pjax;
use kartik\form\ActiveForm;
use yii\helpers\Html;
use forma\modules\customer\records\Customer;
use forma\modules\warehouse\records\Warehouse;
use forma\modules\selling\records\selling\StateConfirm;
use yii\helpers\Url;
use forma\modules\core\widgets\DetachedBlock;
use kartik\select2\Select2;
use forma\components\ActiveRecordHelper;

/**
 * @var Selling $model
 */

Pjax::begin(['id' => 'selling-form-pjax', 'enablePushState' => false]);

if (!Yii::$app->request->isPjax) {
    $js = "
    $('document').ready(function() {
        $('#selling-form-pjax').on('pjax:complete', function(xhr, textStatus, error, options) {
            $.pjax.reload({container: '#selling-nomenclature-pjax'});
            krajeeDialog.alert('Состояние успешно изменено!');
        });
    });
";
    $this->registerJs($js);
}

?>

<?php DetachedBlock::begin([
    'example' => 'Данные',
]); ?>

<div class="operation-form">

    <?php

    $formOptions = [
        'action' => Url::to(['/selling/form/save', 'id' => $model->id]),
        'options' => ['data-pjax' => '1'],
        'fieldConfig' => [
            'inputOptions' => [
                'class' => 'form-control',
                'disabled' => $model->stateIs(new StateDone()),
            ],
        ],
    ];

    $form = ActiveForm::begin($formOptions);

    ?>

    <div class="row">
        <div class="col-md-6">
            <?php
            $label = $model->getAttributeLabel('warehouse_id');
            $label .= '
                [<a
                    class="select-modal-link"
                    data-select="#selling-warehouse_id"
                    data-action="view"
                    href="' . Url::to(['/warehouse/warehouse/view']) . '"
                >детали</a>]
                [<a
                    class="select-modal-link"
                    data-select="#selling-warehouse_id"
                    data-action="create"
                    href="' . Url::to(['/warehouse/warehouse/create']) . '"
                >добавить</a>]
            ';
            ?>
            <?= $form->field($model, 'warehouse_id')->widget(Select2::classname(), [
                'data' => Warehouse::getList(),
                'options' => ['placeholder' => ''],
                'pluginOptions' => ['allowClear' => true],
            ])->label($label) ?>
        </div>

        <div class="col-md-6">
            <?php
            $label = $model->getAttributeLabel('customer_id');
            $label .= '
                [<a
                    class="select-modal-link"
                    data-select="#selling-customer_id"
                    data-action="view"
                    href="' . Url::to(['/customer/customer/view']) . '"
                >детали</a>]
                [<a
                    class="select-modal-link"
                    data-select="#selling-customer_id"
                    data-action="create"
                    href="' . Url::to(['/customer/customer/create']) . '"
                >добавить</a>]
            ';
            ?>
            <?= $form->field($model, 'customer_id')->widget(Select2::classname(), [
                'data' => Customer::getList(),
                'options' => ['placeholder' => ''],
                'pluginOptions' => ['allowClear' => true],
            ])->label($label) ?>
        </div>
    </div>

    <?php if (!$model->stateIs(new StateDone())): ?>
        <div class="row">
            <div class="col-md-12 form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success', 'id' => 'selling-form-submit-button']) ?>
            </div>
        </div>
    <?php endif; ?>

    <?php ActiveForm::end(); ?>

</div>

<?php DetachedBlock::end(); ?>

<?php Pjax::end() ?>

<?php if (!$model->isNewRecord): ?>
    <?php DetachedBlock::begin(['example' => 'История']); ?>
    <div class="row">
        <div class="col-md-12 form-group">
        <?= Html::a('Начать разговор', Url::to('strategy/talk?id='.$model->id), ['class' => 'btn btn-success', 'id' => 'selling-talk'])?> 
        <?= Html::Button('История', ['class' => 'btn btn-success',  'id' => 'openDialog']) ?>
    </div>
    <div class="hidden" id="dialog">

        <?php Pjax::begin(['enablePushState' => false]) ?>
        <?= $model->dialog ?>
        <?= $form = Html::beginForm(['talk/comment-history'], 'post', ['data-pjax' => '', 'class' => 'form-inline']); ?>
        <div class="form-group">
            <?= Html::textarea('comment', '', ['rows' => 5, 'placeholder' => 'Оставьте комментарий к диалогу']) ?>
        </div>
        <?= Html::input('hidden', 'id', $model->id, ['rows' => 5]) ?>
        <div class="form-group">
            <?= Html::submitButton('Добавить', ['class' => 'btn btn-success'])?>
        </div>
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
<?php endif; ?>
