<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model forma\modules\inventorization\records\Inventorization */

$this->title = 'Создать инвентаризацию';
$this->params['breadcrumbs'][] = ['label' => 'Инвентаризация', 'url' => ['index']];

?>
<div class="inventorization-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
