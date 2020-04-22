<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\Selling */

$this->title = 'Create Selling';
$this->params['breadcrumbs'][] = ['label' => 'Sellings', 'url' => ['index']];

?>
<div class="selling-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
