<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\requeststrategy\RequestStrategy */

$this->title = Yii::t('app', 'Создать вопрос к стратегии');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Вопрос к стратегии'), 'url' => ['index']];

?>
<div class="request-strategy-create">



    <?= $this->render('_form', [
        'model' => $model,
        'request' => $request,
        'strategy' => $strategy,
    ]) ?>

</div>
