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
use forma\modules\selling\widgets\HistoryView;

/**
 * @var Selling $model
 */


?>

<?php

$formOptions = [
    'action' => Url::to(['/selling/form/save', 'id' => $model->id]),
    'options' => ['data-pjax' => '1','id'=>'selling-form-send'],
    'fieldConfig' => [
        'inputOptions' => [
            'class' => 'form-control',
            'disabled' => $model->stateIs(new StateDone()),
        ],
    ],
];


?>

<div class="row">
    <div class="col-md-<?= ($model->isNewRecord) ? '8' : '4' ?>">
        <div class="operation-form">
            <?php DetachedBlock::begin([
                'example' => 'Данные',
            ]); ?>
            <?php
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
            Pjax::begin(['id' => 'selling-form-pjax', 'enablePushState' => false]);
            ?>
            <?php

            $form = ActiveForm::begin($formOptions);
            $label = $model->getAttributeLabel('warehouse_id');
            $label .= '
                [<a
                    class="select-modal-link no-loader"
                    data-select="#selling-warehouse_id"
                    data-action="view"
                    href="' . Url::to(['/warehouse/warehouse/view']) . '"
                >детали</a>]
                [<a
                    class="select-modal-link no-loader"
                    data-select="#selling-warehouse_id no-loader"
                    data-action="create"
                    href="' . Url::to(['/warehouse/warehouse/create']) . '"
                >добавить</a>]
            ';
            ?>
            <?= $form->field($model, 'warehouse_id')->widget(Select2::classname(), [
                'data' => Warehouse::getList(),
                'options' => ['placeholder' => '','id'=>'warehouse-id'],
                'pluginOptions' => ['allowClear' => true],
            ])->label($label) ?>

            <?php
            $label = $model->getAttributeLabel('customer_id');
            $label .= '
                [<a
                    class="select-modal-link no-loader"
                    data-select="#selling-customer_id"
                    data-action="view"
                    href="' . Url::to(['/customer/customer/view']) . '"
                >детали</a>]
                [<a
                    class="select-modal-link no-loader"
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

            <?php if (!$model->isNewRecord): ?>

                <?= $form->field($model, 'date_complete')->widget(kartik\datetime\DateTimePicker::className(), [
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd hh:ii:ss'
                    ]
                ]) ?>

            <?php endif; ?>

            <?= $form->field($model, 'comment')->widget(\vova07\imperavi\Widget::className(), [
                'settings' => [
                    'lang' => 'ru',
                    'minHeight' => 200,]]); ?>


        </div>


        <?php ActiveForm::end(); ?>
        <?php if (!$model->stateIs(new StateDone())): ?>
            <button onclick="isWarehouse(<?= $model->warehouse_id ?>)" style="width: 100%;" type="submit" id="selling-form-submit-button" class="form-group btn btn-success"><i
                        class="fa fa-save"></i>
                Сохранить
            </button>
        <?php endif; ?>
        <?php Pjax::end() ?>
        <?php DetachedBlock::end(); ?>
    </div>


    <div class="col-md-8" style="height: 100%;">

        <?php if (!$model->isNewRecord): ?>
            <?= HistoryView::widget(['model' => $model, 'talk' => true, 'history' => true]) ?>
        <?php endif; ?>

    </div>
</div>
<script>
    function  isWarehouse(e){
        let newWarehouseId = document.getElementById('warehouse-id').value;
        if(newWarehouseId == e){
            let form = document.getElementById("selling-form-send");
            form.submit();
        }else{
            let r = confirm("При смене склада, все выбранные товары сбросятся, хотите продолжить ?");
            if (r === true) {
                let form = document.getElementById("selling-form-send");
                form.submit();
            } else {
                return false;
            }

        }

    }
</script>