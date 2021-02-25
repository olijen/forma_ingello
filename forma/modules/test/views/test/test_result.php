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
<?php foreach ($questions as $blockName => $fields): ?>
    <h3> <?php echo $blockName ;?></h3>
                <?php foreach ($fields as $field): ?>

        <strong><?php echo  $field->label_name ?></strong>

                   <br> <?php echo $result['name' . $field->id] ?><br>
                <?php endforeach; ?>

<?php endforeach; ?>



