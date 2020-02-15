<?php

/* @var $this yii\web\View */
/* @var $model forma\modules\product\records\Product */

$this->title = 'Изменить объект учета: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Объекты', 'url' => '/product'];
$this->params['breadcrumbs'][] = ['label' => 'Объекты учета', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name;
?>
<div class="product-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
