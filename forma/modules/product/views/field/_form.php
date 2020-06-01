<?php

use forma\modules\product\components\SystemWidget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model forma\modules\product\records\Field */
/* @var $form yii\widgets\ActiveForm */
?>



<?php $form = ActiveForm::begin([
    'options' => ['data-pjax' => false,]
]); ?>
<div>
    <div class="col-md-5 block">
        <?= $form->field($model, 'id')->textInput()->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'category_id')->textInput()->hiddenInput()->label(false) ?>


        <?php
        echo ' <label> Тип виджета</label>';
        $WidgetNames = SystemWidget::getFunctionNames();
        echo Html::dropDownList('Field[widget]',
            $model->widget, $WidgetNames, ['class' => 'form-control',
                'onchange' => "$.pjax({  
                    type : 'POST',         
                    url : '/product/field/get-field-value-pjax',
                    container: '#pjax-field-value',         
                    data: $(this).serialize() + '&id=" . $model->id . "',
                    push: false,
                    replace: false,         
                    timeout: 10000,         
                    \"scrollTo\" : false     
                    })"
            ]);
        ?>


        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'data-pjax' => 0]) ?>
        </div>
    </div>
    <div class="col-md-5 block">

        <?php Pjax::begin(['id' => 'pjax-field-value', 'enablePushState' => false,]); ?>
        <?= $this->render('field_value', [
            'model' => $model,
        ]) ?>
        <?php Pjax::end(); ?>

    </div>


</div>
<?php ActiveForm::end(); ?>


