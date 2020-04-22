<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model forma\modules\warehouse\records\Warehouse */

$this->title = 'Создать хранилище';
$this->params['breadcrumbs'][] = ['label' => 'Хранилища', 'url' => ['index']];

?>
<div class="warehouse-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
