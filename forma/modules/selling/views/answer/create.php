<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\talk\Answer */

$this->title = Yii::t('app', 'Создать ответ');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ответы'), 'url' => ['index']];

?>
<div class="answer-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
