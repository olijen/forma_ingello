<?php

use vova07\imperavi\Widget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use forma\components\ActiveRecordHelper;
use forma\modules\country\records\Country;
use yii\widgets\Pjax;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model forma\modules\customer\records\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<?php if (Yii::$app->request->isAjax): ?>
    <h2><?= $this->title ?></h2>
<?php endif; ?>

<div class="customer-form">

    <?php
        $formOptions = [
            'id' => 'customer-form',
        ];
        if (Yii::$app->request->isAjax) {
            $formOptions['options'] = [
                'class' => 'select-modal-form',
                'data-select' => '#selling-customer_id',
            ];
        }
        $form = ActiveForm::begin($formOptions);

    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_company')->checkbox() ?>

    <div id="company-fields" >
        <?= $form->field($model, 'firm')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'company_phone')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'company_email')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'site_company')->textInput(['maxlength' => true]) ?>

    </div>

    <?= $form->field($model, 'country_id')->dropDownList(ActiveRecordHelper::getList(Country::className()), [
        'prompt' => '',
    ]) ?>
    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'chief_phone')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'telegram')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'skype')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'whatsapp')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'viber')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'customer_source_id')->widget(Select2::classname(), [
        'data' => \forma\modules\selling\records\customersource\CustomerSource::className()::getList(),
        'options' => ['placeholder' => ''],
        'pluginOptions' => ['allowClear' => true],
    ])->label('Представитель компании') ?>




    <?= $form->field($model, 'chief_email')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'description')->widget(Widget::className(), [
        'settings' => [
            'lang' => 'ru',
            'minHeight' => 200,
            'plugins' => [
                'clips',
                'fullscreen',
                'imagemanager',
                'filemanager',
            ],
            'clips' => [
                ['Lorem ipsum...', 'Lorem...'],
                ['red', '<span class="label-red">red</span>'],
                ['green', '<span class="label-green">green</span>'],
                ['blue', '<span class="label-blue">blue</span>'],
            ],
            'imageUpload' => '/worker/worker/file-upload', // \yii\helpers\Url::to(['/worker/worker/image-upload']),
            'imageManagerJson' => '/worker/worker/file-upload', // \yii\helpers\Url::to(['/worker/worker/images-get']),
            'fileManagerJson' => '/worker/worker/file-upload', // \yii\helpers\Url::to(['/worker/worker/files-get']),
            'fileUpload' => '/worker/worker/file-upload' //\yii\helpers\Url::to(['/worker/worker/file-upload'])
        ],
    ]); ?>

    <div class="form-group" style="width: 150px">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'style' => ['width' => '100%']]) ?>
        </div>
        <?php if (!$model->isNewRecord): ?>
            <div class="form-group">
                <?= Html::button('История диалога', ['class' => 'btn btn-success', 'id' => 'openDialog', 'style' => ['width' => '100%']]) ?>
            </div>
        <?php endIf ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>

<?php
    if ($model->isNewRecord || $model->is_company != 1) { ?>
        <script>
            $('#company-fields').hide();
        </script>
  <?php  }
?>

<script>
    $('#customer-is_company')[0].onclick = function (){
        showHideCompanyFields(this.checked);
    }

    function showHideCompanyFields (isChecked) {
        if(isChecked) {
            $('#company-fields').show();
        } else {
            $('#company-fields').hide();
        }
    }
</script>
