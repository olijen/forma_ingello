<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model forma\modules\vacancy\records\Vacancy */

$this->title = Yii::t('app', 'Создать вакансию');
$this->params['homeLink'] = ['label' => 'Панель упраления', 'url' => '/hr', 'title' => 'Панель управления модулем найма'];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Вакансии'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancy-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
