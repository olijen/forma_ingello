<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\strategy\Strategy */

$this->title = Yii::t('app', 'Создать стратегию');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Стратегии'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="strategy-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
