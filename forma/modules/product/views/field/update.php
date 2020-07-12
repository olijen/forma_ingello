<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\product\records\Field */

$this->title = 'Редактировать поле: ' . $model->name;


?>
<div class="field-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
