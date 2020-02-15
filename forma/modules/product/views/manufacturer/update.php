<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\product\records\Manufacturer */

$this->title = 'Изменить производителя: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Люди', 'url' => '/core/default/people'];
$this->params['breadcrumbs'][] = ['label' => 'Производители', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name;
?>
<div class="manufacturer-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
