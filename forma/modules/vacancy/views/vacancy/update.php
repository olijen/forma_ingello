<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\vacancy\records\Vacancy */

$this->title = Yii::t('app', 'Редактировать вакансию: ' . $model->name, [
    'nameAttribute' => '' . $model->name,
]);
$this->params['homeLink'] = ['label' => 'Панель упраления', 'url' => '/hr', 'title' => 'Панель управления модулем найма'];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Вакансии'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Обновить');
?>
<div class="vacancy-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
