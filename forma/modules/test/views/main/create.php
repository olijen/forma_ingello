<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TestType */

$this->title = 'Create Test Type';
$this->params['breadcrumbs'][] = ['label' => 'Test Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
