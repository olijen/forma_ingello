<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\requeststrategy\RequestStrategy */
/* @var $request forma\modules\selling\records\requeststrategy\RequestStrategy */
/* @var $strategy forma\modules\selling\records\requeststrategy\RequestStrategy */

$this->title = Yii::t('app', 'Обновить вопрос к стратегии: ' . $model->id, [
    'nameAttribute' => '' . $model->id,
]);

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Request Strategies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->request_id, 'url' => ['view', 'request_id' => $model->request_id, 'strategy_id' => $model->strategy_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Обновить');

?>
<div class="request-strategy-update">



    <?=
    $this->render('_form', [
        'model' => $model,
        'request' => $request,
        'strategy' => $strategy,
    ]) ?>

</div>
