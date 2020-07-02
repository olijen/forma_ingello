<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\WidgetUser */

$this->title = 'Update Widget User: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Widget Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="widget-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
