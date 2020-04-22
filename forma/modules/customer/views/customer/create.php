<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model forma\modules\customer\records\Customer */

$this->title = 'Создать клиента';
$this->params['breadcrumbs'][] = ['label' => 'Люди', 'url' => '/core/default/people'];
$this->params['breadcrumbs'][] = ['label' => 'Клиенты', 'url' => ['index']];

?>
<div class="customer-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
