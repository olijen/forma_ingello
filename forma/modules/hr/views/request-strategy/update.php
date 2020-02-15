<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\hr\records\requeststrategy\RequestStrategy */

$this->title = Yii::t('app', 'Update Request Strategy: ' . $model->request_id, [
    'nameAttribute' => '' . $model->request_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Request Strategies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->request_id, 'url' => ['view', 'request_id' => $model->request_id, 'strategy_id' => $model->strategy_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="request-strategy-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
