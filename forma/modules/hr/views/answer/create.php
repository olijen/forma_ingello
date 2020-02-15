<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model forma\modules\hr\records\talk\Answer */

$this->title = Yii::t('app', 'Create Answer');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Answers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="answer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
