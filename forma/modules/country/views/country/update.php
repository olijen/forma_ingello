<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\country\records\Country */

$this->title = 'Изменить страну: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Объекты', 'url' => '/product'];
$this->params['breadcrumbs'][] = ['label' => 'Страны', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name;
?>
<div class="country-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
