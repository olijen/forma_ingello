<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model forma\modules\product\records\Type */

$this->title = 'Create Type';
$this->params['breadcrumbs'][] = ['label' => 'Types', 'url' => ['index']];

?>
<div class="type-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
