<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model forma\modules\product\records\Category */

$this->title = 'Создать категорию';
$this->params['breadcrumbs'][] = ['label' => 'Объекты', 'url' => '/product'];
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];

?>
<div class="category-create">

    <?= $this->render('_form', [
        'model' => $model,
        'possibleCategories' => $possibleCategories,
    ]) ?>

</div>
