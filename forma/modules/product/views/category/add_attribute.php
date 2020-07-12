<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Url;
use forma\modules\product\components\SystemWidget;

?>

<?php $form = ActiveForm::begin([
    'id' => 'update-widget-form',
]); ?>
<div class="box-header" id="accordion" style="margin-top: 10px">
    <div class="box-header with-border"
    ">
    <h4 class="box-title">
        <a data-toggle="collapse" data-parent="#accordion"
           href="#collapse_1" class="collapsed"
           aria-expanded="false">
            <i class="fa fa-plus"></i>
            Добавить
        </a>
    </h4>
</div>
<div id="collapse_1"
     class="panel-collapse collapse"
     aria-expanded="false" style="margin-top: 30px;">

    <div>
        <?= $form->field($field, 'name')->textInput(['maxlength' => true]) ?>


        <input type="hidden" id="field-category_id" class="form-control" name="Field[category_id]" aria-required="true"
               aria-invalid="false" value="<?= $model->id ?>"">

        <?php
        echo ' <label> Тип виджета</label>';
        $WidgetNames = SystemWidget::getFunctionNames();
        echo Html::dropDownList('Field[widget]',
            $WidgetNames, $WidgetNames, ['class' => 'form-control',
                'onchange' => "$.pjax({         
                             type : 'POST',         
                             url : '/product/category/update?id={$_GET['id']}',
                             container: '#my-pjax-container',         
                             data :  $(this).serialize(), 
                             push: false,
                             replace: false,         
                             timeout: 10000,         
                             \"scrollTo\" : false     
                      })",
            ]); ?>

        <?php Pjax::begin(['id' => 'my-pjax-container', 'enablePushState' => false,]); ?>
        <?php if (isset($nameWidgetField)): ?>
            <?= $this->render('field_widget', [
                '$nameWidgetField' => $nameWidgetField,
                'field' => $field,
            ]); ?>
        <?php else: ?>
            <?= $form->field($field, 'defaulted')->textInput(['maxlength' => true]) ?>
        <?php endif; ?>
        <?php Pjax::end(); ?>
        <br>
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
        <br> <br>

    </div>
    <?php ActiveForm::end(); ?>
