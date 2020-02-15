<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model forma\modules\supplier\records\Supplier */

$this->title = 'Создать поставщика';
$this->params['breadcrumbs'][] = ['label' => 'Люди', 'url' => '/core/default/people'];
$this->params['breadcrumbs'][] = ['label' => 'Поставщики', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supplier-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
