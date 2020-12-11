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
<?php foreach ($testType->testTypeFields as $field){


    $questions[$field->block_name] = [];

}
//var_dump($questions);
foreach ($testType->testTypeFields as $field){
    $questions[$field->block_name][] = $field;
}

?>
<?php foreach ($questions as $blockName => $fields): ?>
    <div class="col-md-6">
        <?php DetachedBlock::begin(['example' => $blockName]); ?>
        <?php foreach ($fields as $field): ?>

           <?php echo 'Вопрос: '.$field->label_name?>
        <br>
<!--        --><?php //var_dump($field->value); ?>
           <?php echo'Ответ: '. $_POST['name'.$field->id] .'<br>'?>

        <?php endforeach;?>
        <?php DetachedBlock::end(); ?>
    </div>

    <?php endforeach; ?>
<?= Html::submitButton('<i class="fa fa-save"></i>'.' '.'Завершить',
    ['class' => 'btn btn-success btn-lg btn-block']) ?>
    <?php ActiveForm::end(); ?>

