<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use forma\modules\core\widgets\DetachedBlock;


/* @var $this yii\web\View */
/* @var $model forma\modules\test\records\TestTypeField */
/* @var $testType forma\modules\test\records\TestType */
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
<?php endforeach; ?>
