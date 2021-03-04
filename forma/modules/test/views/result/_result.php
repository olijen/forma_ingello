<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use forma\modules\core\widgets\DetachedBlock;


/* @var $this yii\web\View */
/* @var $model forma\modules\test\records\TestTypeField */
/* @var $test forma\modules\test\records\Test */
/* @var $testType forma\modules\test\records\TestType */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Результат теста';
?>
<div class="row">
    <?php echo $test->result; ?>
</div>



