<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model forma\modules\hr\records\strategy\Strategy */

$this->title = Yii::t('app', 'Create Strategy');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Strategies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="strategy-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
