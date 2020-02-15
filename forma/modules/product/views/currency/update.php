<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\product\records\Currency */

$this->title = 'Изменить валюту: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Объекты', 'url' => '/product'];
$this->params['breadcrumbs'][] = ['label' => 'Валюты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="currency-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
