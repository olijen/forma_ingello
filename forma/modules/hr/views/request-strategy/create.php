<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model forma\modules\hr\records\requeststrategy\RequestStrategy */

$this->title = Yii::t('app', 'Create Request Strategy');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Request Strategies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-strategy-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'request' => $request,
        'strategy' => $strategy,
    ]) ?>

</div>
