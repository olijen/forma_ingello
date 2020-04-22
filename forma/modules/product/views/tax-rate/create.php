<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model forma\modules\product\records\TaxRate */

$this->title = 'Создать налоговую ставку';
$this->params['breadcrumbs'][] = ['label' => 'Объекты', 'url' => '/product'];
$this->params['breadcrumbs'][] = ['label' => 'Налоговые ставки', 'url' => ['index']];

?>
<div class="tax-rate-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
