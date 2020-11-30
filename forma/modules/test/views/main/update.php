<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modeles\test\records\TestType */

$this->title = 'Update Test Type: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Test Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="test-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('/test/index', [
        'model' => $model,
    ]) ?>

</div>
