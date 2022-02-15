<?php

use forma\modules\core\services\RegularityAndItemPictureService;
use kartik\file\FileInput;
use yii\helpers\BaseHtml;
use yii\helpers\Html;
use vova07\imperavi\Widget;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\Regularity */
/* @var $form yii\widgets\ActiveForm */

$this->params['icons'][] = $icons;

$format = <<< SCRIPT
function format(icon) {
    let iconName = 'fa fa-'+icon.text;
    return "<i style='padding-right: 5px; font-size: 20px;' class='"+iconName+"' ></i>"+icon.text+"";
}
SCRIPT;

$escape = new \yii\web\JsExpression("function(m) { return m; }");
$this->registerJs($format, \yii\web\View::POS_HEAD);

if ($model->hasErrors()):
    \wokster\ltewidgets\BoxWidget::begin([
        'solid' => true,
        'color' => 'danger',
        'title' => 'Ошибки валидации',
        'close' => true,
    ]);
    $error_data = $model->firstErrors;
    echo \yii\widgets\DetailView::widget([
        'model' => $error_data,
        'attributes' => array_keys($error_data)
    ]);
    \wokster\ltewidgets\BoxWidget::end();
endif;

$picture = RegularityAndItemPictureService::getPictureUrl($model);
?>

<div class="col-md-5 block">

    <?php $form = ActiveForm::begin([]); ?>

    <?= $form->field($model, 'name', ['options' => ['class' => 'col-xs-12']])->textInput() ?>

    <?= $form->field($model, 'order', ['options' => ['class' => 'col-xs-12']])->textInput() ?>

    <div class="col-xs-12">
        <?= $form->field($model, 'title')->widget(Widget::className(), [
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
    </div>
    <?= $form->field($model, 'icon', ['options' => ['class' => 'col-xs-12']])->widget(kartik\select2\Select2::className(), [
        'data' => $icons,
        'options' => ['placeholder' => 'Выберите иконку ...'],
        'pluginOptions' => [
            'templateResult' => new \yii\web\JsExpression('format'),
            'templateSelection' => new \yii\web\JsExpression('format'),
            'escapeMarkup' => $escape,
            'allowClear' => true
        ],
    ])->label('Иконка')
    ?>

    <div class="col-xs-12">
        <?= $form->field($model, 'picture')->widget(FileInput::classname(), [
            'options' => [
                'accept' => 'image/*',
            ],
            'pluginOptions' => [
                'initialPreview' => $picture,
                'showUpload' => false,
                'browseLabel' => '',
                'removeLabel' => 'Удалить',
                'mainClass' => 'input-group-lg'
            ],
        ]); ?>
    </div>
    <?= BaseHtml::hiddenInput('Item[pictureUrl]', $model->picture); ?>

    <?= $form->field($model, 'access')->checkbox([], false); ?>

    <div class="col-xs-12 col-md-12">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Добавить') : Yii::t('app', 'Сохранить'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<div class="col-md-7">
    <?= $this->render('/regularity/function_buttons', ['quantityDiv' => 2, 'colMd' => 6]) ?>
</div>
