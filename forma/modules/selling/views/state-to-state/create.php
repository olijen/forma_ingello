<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\state\StateToState */

$this->title = Yii::t('app', 'Create State To State');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'State To States'), 'url' => ['index']];

?>
<div class="state-to-state-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'data'=>$data
    ]) ?>

</div>
