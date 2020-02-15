<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model forma\modules\transit\records\Transit */

$this->title = 'Create Transit';
$this->params['breadcrumbs'][] = ['label' => 'Transits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
