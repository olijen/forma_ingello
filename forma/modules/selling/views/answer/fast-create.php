<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\talk\Answer */

$this->title = Yii::t('app', 'Создать ответ быстро');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ответы'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="answer-create">

    <?= $this->render('_fast-form', [
        'model' => $model,
    ]) ?>

</div>
