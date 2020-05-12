<?php

use forma\modules\product\records\FieldValue;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Url;

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
            'template' => '{delete}'
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
                'value' => function ($searchModelValue, $field_id) {
                    return Html::activeDropDownList($searchModelValue, 'name',
                        ArrayHelper::map(FieldValue::find()
                            ->where(['field_id' => $field_id])
                            ->asArray()->all(), 'id', 'name')
                    );
                },
//                    'filter' => Html::activeDropDownList($searchModelValue, 'name',
//                        ArrayHelper::map(FieldValue::find()->asArray()->all(), 'id', 'name'),
//                        ['class'=>'form-control','prompt' => 'Select Category'] ),
            ],

//            [
//                'attribute' => 'fieldValues.is_main',
//                'value' => function ($field_id) {
//                    $is_main = FieldValue::find()->where(['is_main' => 1])
//                        ->andWhere(['field_id' => $field_id])
//                        ->asArray()->one();
//                    if ($is_main) {
//                        return $is_main['name'];
//                    } else {
//                        return null;
//                    }
//
//                },
//            ],

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

    <?= $form->field($field, 'widget')
        ->dropDownList(\yii\helpers\ArrayHelper::map(\forma\modules\product\records\Field::find()
            ->all(), 'id', 'name')
        ) ?>

    <?= $form->field($field, 'defaulted')->textInput(['maxlength' => true]) ?>

    <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    <br> <br>

    <?php ActiveForm::end(); ?>
</div>