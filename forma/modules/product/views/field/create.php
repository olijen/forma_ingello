<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\product\records\Field */

$this->title = 'Create Field';
$this->params['breadcrumbs'][] = ['label' => 'Fields', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="field-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
