<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use forma\modules\core\widgets\DetachedBlock;
use vova07\imperavi\Widget;


/* @var $this yii\web\View */
/* @var $model forma\modules\test\records\TestTypeField */
/* @var $testType forma\modules\test\records\TestType */
/* @var $customer forma\modules\customer\records\Customer */
/* @var $form yii\widgets\ActiveForm */

$this->title = $testType['name'];

?>

<?php $form = ActiveForm::begin(); ?>
<?php $questions = []; ?>
<?php foreach ($testType->testTypeFields as $field) {
    $questions[$field->block_name] = [];
}
foreach ($testType->testTypeFields as $field) {
    $questions[$field->block_name][] = $field;
}

?>
<?php foreach ($questions as $blockName => $fields): ?>
<div class="row">
    <div class="col-md-6">
        <?php DetachedBlock::begin(['example' => $blockName]); ?>
        <?php foreach ($fields as $field): ?>
            <div class="form-group">
                <input type="hidden" value="<?= $field->test_id ?>" name="id">
                <label for="name"><?= $field->label_name ?></label>
                <?php if ($field->type == 'text'): ?>
                    <input class="form-control form-control-lg" type="text" checked value="<?= $field->value ?>" name="name<?= $field->id ?>" placeholder="<?= $field->placeholder ?>">
                <?php elseif (isset($field->value)): ?>
                    <?php $value = $field->value;
                    $value = explode('||', $value);
                    foreach ($value as $str) {
                        echo '<br><input type="' . $field->type . '" value="' . $str . '" name="name' . $field->id . '"  placeholder="' . $field->placeholder . '">' . ' ' . $str . '<br>';
                    }
                    ?>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
        <?php DetachedBlock::end(); ?>
    </div>
</div>
<?php endforeach; ?>
<div class="row">
<div class="col-md-6">
<?php DetachedBlock::begin(['example' => 'Контактые данные']); ?>
<?= $form->field($customer,'name')->textInput()->label('Ваше имя') ?>
<?= $form->field($customer,'chief_email')->textInput()->label('Ваша почта') ?>
<?= $form->field($customer, 'description')->label('Описание')->widget(Widget::className(), [
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
        'imageUpload' => \yii\helpers\Url::to(['/project/project/image-upload']),
        'imageManagerJson' => \yii\helpers\Url::to(['/project/project/images-get']),
        'fileManagerJson' => \yii\helpers\Url::to(['/project/project/files-get']),
        'fileUpload' => \yii\helpers\Url::to(['/project/project/file-upload'])
    ],
]); ?>
<?php DetachedBlock::end()?>
<?= Html::submitButton('<i class="fa fa-save"></i>' . ' ' . 'Завершить',
    ['class' => 'btn btn-success btn-lg btn-block']) ?>
</div>
</div>
<?php ActiveForm::end(); ?>

