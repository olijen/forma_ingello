<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\project\records\project\Project */

$this->title = Yii::t('app', 'Редактировать проект: ' . $model->name, [
    'nameAttribute' => '' . $model->name,
]);
$this->params['homeLink'] = ['label' => 'Панель упраления', 'url' => '/hr', 'title' => 'Панель управления модулем найма'];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Проекты'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Редактировать');
?>
<div class="project-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
