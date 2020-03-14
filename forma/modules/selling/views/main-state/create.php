<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\state\State */

$this->title = Yii::t('app', 'Создать состояние');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'States'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="state-create">



    <?= $this->render('_form', [
        'model' => $model
    ]) ?>

</div>
