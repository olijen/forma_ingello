<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\SystemEvent */

$this->title = 'Update System Event: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'System Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="system-event-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
