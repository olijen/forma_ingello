<?php

/* @var $this yii\web\View */
/* @var $model forma\modules\product\records\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Объекты', 'url' => '/product'];

?>
<div class="product-update">

    <?= $this->render('_form', [
        'model' => $model,
        'category_id' => $category_id,
         'field' => $field,
        'fieldAttributes' => $fieldAttributes,

    ]) ?>

</div>
