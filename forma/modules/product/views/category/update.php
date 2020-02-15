<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\product\records\Category */

$this->title = 'Изменить категорию: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Объекты', 'url' => '/product'];
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name;
?>
<div class="category-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
