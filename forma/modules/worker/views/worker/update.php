<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\worker\records\Worker */

$this->title = Yii::t('app', 'Редактировать кадр: ' . $model->name, [
    'nameAttribute' => '' . $model->name,
]);
$this->params['homeLink'] = ['label' => 'Панель упраления', 'url' => '/hr', 'title' => 'Панель управления модулем найма'];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Кадры'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Редактировать');
?>
<div class="worker-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
