<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\product\records\FieldValue */

$this->title = 'Create Field Value';
$this->params['breadcrumbs'][] = ['label' => 'Field Values', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="field-value-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
