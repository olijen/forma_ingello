<?php

use forma\modules\product\components\SystemWidget;
use forma\modules\product\records\FieldValue;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Url;

//de($dataProvider->getModels());
?>


<?php $form = ActiveForm::begin([
    'id' => 'update-widget-form',
    'options' => ['class' => 'form-horizontal'],
]); ?>
<div class="col-md-9 block">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\ActionColumn',
            'template' => '{delete}',
                'controller' => 'field',
            ],
            $field_id = [
                'attribute' => 'id',
                'visible' => false,
            ],
            'name',
            'widget',
            'defaulted',
            [
                'attribute' => 'fieldValues.name',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::activeDropDownList(new FieldValue, 'name',
                        ArrayHelper::map(FieldValue::find()
                            ->where(['field_id' => $model->id])
                            ->all(), 'id', 'name'));
                },
                    'filter' => Html::activeDropDownList(new FieldValue, 'name',
                        ArrayHelper::map(FieldValue::find()->all(), 'id', 'name'),
                        ['class'=>'form-control','prompt' => 'Select Category'] ),
            ],
        ],
    ]); ?>

    <!--        --><? //= $this->render('add_attribute', [
    //            'model' => $model,
    //            'field' => $field,
    //            'fieldValue' => $fieldValue,
    //        ]); ?>

</div>


<div class="col-md-9 block">


    <?= $form->field($field, 'name')->textInput(['maxlength' => true]) ?>


    <input type="hidden" id="field-category_id" class="form-control" name="Field[category_id]" aria-required="true"
           aria-invalid="false" value="<?= $model->id ?>"">

    <label> Тип виджета</label>
    <?php
    $WidgetNames = SystemWidget::getFunctionNames();
    echo Html::dropDownList('Field[widget]',
        $WidgetNames, $WidgetNames, ['class' => 'form-control',
        'onchange'=> "$.pjax({         
                             type : 'POST',         
                             url : '/product/category/update?id={$_GET['id']}',
                             container: '#my-pjax-container',         
                             data :  $(this).serialize(), 
                             push: false,
                             replace: false,         
                             timeout: 10000,         
                             \"scrollTo\" : false     
                      })",
        ]);?>

<!--    --><?//= $form->field($field, 'widget')
//        ->dropDownList(\yii\helpers\ArrayHelper::map(\forma\modules\product\records\Field::find()
//            ->all(), 'name', 'name')
//        ) ?>


    <?php Pjax::begin(['id' => 'my-pjax-container','enablePushState' => false,]); ?>
        <?php if (isset($nameWidgetField)):?>
            <?= $this->render('field_widget', [
                '$nameWidgetField' => $nameWidgetField,
                'field'=> $field,
            ]);?>
        <?php else:?>
            <?= $form->field($field, 'defaulted')->textInput(['maxlength' => true]) ?>
        <?php endif;?>
    <?php Pjax::end(); ?>


    <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    <br> <br>

    <?php ActiveForm::end(); ?>
</div>