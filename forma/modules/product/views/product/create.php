<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model forma\modules\product\records\Product */

$this->title = 'Создать объект';
$this->params['breadcrumbs'][] = ['label' => 'Объекты', 'url' => '/product'];

?>
<div class="product-create">

    <?= $this->render('_form', [
        'model' => $model,
        'fieldAttributes' => $fieldAttributes,
         'field' => $field,

    ]); ?>

</div>

`
