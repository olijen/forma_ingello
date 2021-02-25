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
//var_dump($test->id); //39
//var_dump($test->test_type_id);// 149

?>
<?php $questions = []; ?>

<?php foreach ($testType->testTypeFields as $field) {
    $questions[$field->block_name] = [];
}

foreach ($testType->testTypeFields as $field) {
    $questions[$field->block_name][] = $field;
}
?>
<!--test/view/test-->
<?php foreach ($questions as $blockName => $fields): ?>

    <div class="save" id="save">
        <div class="row">
            <div class="col-md-6">
                <?php foreach ($fields as $field): ?>
                    <?php echo '<b>' . $field->label_name . '</b>' ?>
                    <br>
                    <?php echo '<br>' . $result['name' . $field->id] . '<br>' ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

<?php endforeach; ?>



