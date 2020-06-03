<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\WidgetUser */

$this->title = 'Create Widget User';
$this->params['breadcrumbs'][] = ['label' => 'Widget Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="widget-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
