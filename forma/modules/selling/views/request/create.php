<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\talk\Request */

$this->title = Yii::t('app', 'Создать вопрос');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Вопрос'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
