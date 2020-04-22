<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model forma\modules\product\records\Manufacturer */

$this->title = 'Создать производителя';
$this->params['breadcrumbs'][] = ['label' => 'Люди', 'url' => '/core/default/people'];
$this->params['breadcrumbs'][] = ['label' => 'Производители', 'url' => ['index']];

?>
<div class="manufacturer-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
