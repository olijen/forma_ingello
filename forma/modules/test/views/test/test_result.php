<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use forma\modules\core\widgets\DetachedBlock;


/* @var $this yii\web\View */
/* @var $model forma\modules\test\records\TestTypeField */
/* @var $test forma\modules\test\records\Test */
/* @var $testType forma\modules\test\records\TestType */
/* @var $form yii\widgets\ActiveForm */

$this->title = $testType['name'];
?>
<?php $questions = []; ?>

<?php foreach ($testType->testTypeFields as $field) {
    $questions[$field->block_name] = [];
}

foreach ($testType->testTypeFields as $field) {
    $questions[$field->block_name][] = $field;
}
?>

<div class="col-md-6">
    <?php foreach ($questions as $blockName => $fields): ?>
        <?php DetachedBlock::begin(['example' => $blockName]); ?>
        <?php foreach ($fields as $field): ?>

            <strong><?php echo $field->label_name ?></strong>

<!--            <br> --><?php //echo $result['name' . $field->id] ?><!--<br><br>-->
        <?php endforeach; ?>
        <?php DetachedBlock::end() ?>
    <?php endforeach; ?>
</div>
<div class="col-md-6">
    <?php DetachedBlock::begin(['example' => 'Контактная информация']) ?>
    <h2><?php echo $result['Customer']['name'] ?></h2><br>
    <?php echo $result['Customer']['chief_email'] ?><br>
    <?php echo $result['Customer']['description'] ?>
    <?php DetachedBlock::end() ?>
</div>




