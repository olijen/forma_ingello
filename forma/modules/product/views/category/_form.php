<?php

use forma\modules\product\records\FieldValue;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model forma\modules\product\records\Category */
/* @var $form yii\widgets\ActiveForm */
/* @var $searchModelValue */
/* @var $searchModel */
?>

<?php if (Yii::$app->request->isAjax) {
    Yii::$app->controller->layout = false;
    Pjax::begin();
} ?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php Pjax::begin() ?>
    <div class="col-md-3 block">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'parent_id')->dropDownList(
            \forma\modules\product\records\Category::getList(),
            ['prompt' => '']
        ) ?>

        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>

        <div class="form-group">
            <!--            --><?php //if (Yii::$app->request->isAjax): ?>
            <!--                --><? //= \forma\components\widgets\ModalCreateButton::widget([
            //                    'route' => Url::toRoute('/product/category/create'),
            //                    'selectId' => 'product-category_id',
            //                ]) ?>
            <!--            --><?php //else: ?>
            <!--                --><? //= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
            <!--            --><?php //endif; ?>

        </div>
    </div>
    <?php Pjax::end() ?>
    <!--    --><?php //ActiveForm::end(); ?>


    <div class="col-md-9 block">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\ActionColumn'],

                $field_id = [
                    'attribute' => 'id',
                    'visible' => false,
                ],
                'name',
                'widget',
//                'field.name',

//                [
//                    'attribute' => 'fieldValues.is_main',
//                    'value' => 'fieldValues.name'
//                ],
                [
                    'attribute' => 'fieldValues.is_main',
                    'value' => function($field_id){
                       $is_main =  FieldValue::find()->where(['is_main' => 1])
                           ->andWhere(['field_id' => $field_id])
                           ->asArray()->one();
                       if ($is_main){
                           return $is_main['name'];
                       }else{
                           return null;
                       }

                    },
                ],
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
            ],
        ]); ?>

        <!--        --><? //= $this->render('add_attribute', [
        //            'model' => $model,
        //            'field' => $field,
        //            'fieldValue' => $fieldValue,
        //        ]); ?>

    </div>

    <!--    --><?php //$form = ActiveForm::begin(); ?>

    <?= $form->field($field, 'name')->textInput(['maxlength' => true]) ?>


    <input type="hidden" id="field-category_id" class="form-control" name="Field[category_id]" aria-required="true"
           aria-invalid="false" value="<?= $model->id ?>"">

    <?= $form->field($field, 'widget')
        ->dropDownList(\yii\helpers\ArrayHelper::map(\forma\modules\product\records\Field::find()
            ->where(['category_id' => $model->id])
            ->all(), 'id', 'name')
        ) ?>

    <?= $form->field($fieldValue, 'is_main')->textInput(['maxlength' => true]) ?>

    <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    <br> <br>

    <?php ActiveForm::end(); ?>


</div>

<?php if (Yii::$app->request->isAjax) {
    Pjax::end();
} ?>
