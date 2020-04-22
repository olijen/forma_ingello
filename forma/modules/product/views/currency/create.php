<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model forma\modules\product\records\Currency */

$this->title = 'Создать валюту';
$this->params['breadcrumbs'][] = ['label' => 'Объекты', 'url' => '/product'];
$this->params['breadcrumbs'][] = ['label' => 'Валюты', 'url' => ['index']];

?>
<div class="currency-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
