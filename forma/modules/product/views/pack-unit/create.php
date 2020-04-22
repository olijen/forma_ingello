<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model forma\modules\product\records\PackUnit */

$this->title = 'Создать упаковку';
$this->params['breadcrumbs'][] = ['label' => 'Объекты', 'url' => '/product'];
$this->params['breadcrumbs'][] = ['label' => 'Упаковки', 'url' => ['index']];

?>
<div class="pack-unit-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
