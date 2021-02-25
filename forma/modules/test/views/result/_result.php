<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use forma\modules\core\widgets\DetachedBlock;


/* @var $this yii\web\View */
/* @var $model forma\modules\test\records\TestTypeField */
/* @var $test forma\modules\test\records\Test */
/* @var $testType forma\modules\test\records\TestType */
/* @var $form yii\widgets\ActiveForm */

foreach ($testType as $value):

?>

<?php $questions = []; ?>

<?php foreach ($value->testTypeFields as $field) {
    $questions[$field->block_name] = [];

}

foreach ($value->testTypeFields as $field) {
    $questions[$field->block_name][] = $field;

}
    var_dump($field);
exit;
?>
<?php endforeach; ?>
<h2>
<?php echo $this->title = $value['name']; ?>
</h2>
<!--test/view/test-->
<?php foreach ($questions as $blockName => $fields): ?>
    <?php DetachedBlock::begin(['example' => $blockName]); ?>
                <?php echo $test->result?>
    <?php DetachedBlock::end(); ?>

<?php endforeach; ?>




