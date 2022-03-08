<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Victim */

$this->title = 'Create Victim';
$this->params['breadcrumbs'][] = ['label' => 'Victims', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="victim-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
