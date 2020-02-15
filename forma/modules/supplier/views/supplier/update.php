<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\supplier\records\Supplier */

$this->title = 'Изменить поставщика: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Люди', 'url' => '/core/default/people'];
$this->params['breadcrumbs'][] = ['label' => 'Поставщики', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name;
?>
<div class="supplier-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
