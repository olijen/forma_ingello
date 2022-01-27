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
<style>
    @media screen and (max-width: 768px){
        .col-md-8 {
            padding: 0 !important;
        }
        /*  */
    }
</style>
<div class="row">
    <div class="col-md-<?= ($model->isNewRecord) ? '12' : '4' ?>">
        <div class="operation-form">
            <?php DetachedBlock::begin([
                'example' => 'Данные',
                'id' => 'operation-form',
                'style' => ($model->isNewRecord)?"height: 100%":'height:640px'
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
            //$label = $model->getAttributeLabel('warehouse_id');
            $label = '
                <div>
                <div class="col-sm-6 col-md-6 col-xs-6 no-padding">
                <span>Место</span>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-6 no-padding">
                    <a data-action="view" data-select="#selling-warehouse_id" class="btn btn-xs select-modal-link no-loader pull-right " style="color:blue; display: block  text-align: right; margin-left: 2%"  href="' . Url::to(['/warehouse/warehouse/detail']) . '" id="selling-talk"> <i class="fa fa-comments"></i> детали</a>
                    <a data-action="create" data-select="#selling-warehouse_id no-loader" class="btn btn-xs select-modal-link no-loader pull-right" style="color:blue  "  href="' . Url::to(['/warehouse/warehouse/create']) . '"> <i class="fas fa-external-link-alt "></i> добавить</a>

                </div>
                </div>
               
            ';
            ?>
            <?= $form->field($model, 'warehouse_id')->widget(Select2::classname(), [
                'data' => Warehouse::getList(),
                'options' => ['placeholder' => ''],
                'pluginOptions' => ['allowClear' => true],
            ])->label($label,['style'=>'min-width:100%;']) ?>

            <?php
            //$label = $model->getAttributeLabel('customer_id');
            $label = '
                <div>
                <div class="col-sm-6 col-md-6 col-xs-6 no-padding">
                <span>Клиент</span>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-6 no-padding">
                    <a data-action="view" data-select="#selling-customer_id" class="btn btn-xs select-modal-link no-loader pull-right " style="color:blue ;display: block  text-align: right; margin-left: 2%"  href="' . Url::to(['/customer/customer/view']) . '" id="selling-talk"> <i class="fa fa-comments"></i> детали</a>
                    <a data-action="create" data-select="#selling-customer_id" class="btn btn-xs select-modal-link no-loader pull-right" style="color:blue "  href="' . Url::to(['/customer/customer/create']) . '"> <i class="fas fa-external-link-alt "></i> добавить</a>

                </div>
                </div>
               
            ';
            ?>
            <?= $form->field($model, 'customer_id')->widget(Select2::classname(), [
                'data' => Customer::getList(),
                'options' => ['placeholder' => ''],
                'pluginOptions' => ['allowClear' => true],
            ])->label($label,['style'=>'min-width:100%;']) ?>

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
                    'minHeight' => 200,'maxHeight' => 220]]); ?>


        </div>

        <?php if ($model->isNewRecord == true): ?>
            <button style="width: 100%;" type="submit" id="selling-form-submit-button" class="form-group btn btn-success"><i
                        class="fa fa-save"></i>
                Сохранить
            </button>
        <?php endif; ?>
        <?php ActiveForm::end(); ?>
        <?php if (!$model->stateIs(new StateDone()) && $model->isNewRecord !== true): ?>
            <button onclick = isWarehouse(<?= $model->warehouse_id ?>) style="width: 100%;" type="submit" id="selling-form-submit-button" class="form-group btn btn-success"><i
                        class="fa fa-save"></i>
                Сохранить
            </button>
        <?php endif; ?>
        <?php Pjax::end() ?>
        <?php DetachedBlock::end(); ?>
    </div>




    <div class="col-md-8" style="padding-left: 15px; padding-right: 15px;">

        <?php if (!$model->isNewRecord): ?>
            <?= HistoryView::widget(['model' => $model, 'talk' => true, 'history' => true]) ?>
        <?php endif; ?>

    </div>
</div>
<script>
    function  isWarehouse(e){
        let newWarehouseId = document.getElementById('selling-warehouse_id').value;
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
    function newWarehouse(){
        let form = document.getElementById("selling-form-send");
        form.submit();
    }
    $(".bs-example").css("display", 'flex');
    $(".bs-example").css("flex-direction",'column');
    $(".bs-example").css("justify-content",'end');
</script>