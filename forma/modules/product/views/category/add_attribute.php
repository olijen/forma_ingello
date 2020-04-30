<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Url;
?>

<?php $form = ActiveForm::begin(); ?>

<div class="col-md-9 block">
<!--    <div class="box-header" id="accordion" style="margin-top: 10px">-->
<!--        <div class="box-header with-border"-->
<!--        ">-->
<!--        <h4 class="box-title">-->
<!--            <a data-toggle="collapse" data-parent="#accordion"-->
<!--               href="#collapse_1" class="collapsed"-->
<!--               aria-expanded="false">-->
<!--                <i class="fa fa-plus"></i>-->
<!--                Добавить-->
<!--            </a>-->
<!--        </h4>-->
<!--    </div>-->
<!--    <div id="collapse_1"-->
<!--         class="panel-collapse collapse"-->
<!--         aria-expanded="false" style="margin-top: 30px;">-->
<!--        <div class="box-body">-->
<!--            <h4>Текст</h4>-->
<!--        </div>-->
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($field, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($field, 'widget')
            ->dropDownList(\yii\helpers\ArrayHelper::map(\forma\modules\product\records\Field::find()
            ->where(['category_id' => $model->id])
            ->all(), 'id', 'name')
            ) ?>

        <?= $form->field($fieldValue, 'is_main')->textInput(['maxlength' => true]) ?>

    <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    <br>    <br>
<!--        --><?//= $form->field($field, 'widget')->dropDownList(
//            \forma\modules\product\records\Field::getList(),
//            ['prompt' => '']
//        ) ?>

        <?php ActiveForm::end(); ?>

    </div>
<!--</div>-->
<?php ActiveForm::end(); ?>
