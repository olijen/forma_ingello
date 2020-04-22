<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model forma\modules\project\records\project\Project */

$this->title = Yii::t('app', 'Создать проект');
$this->params['homeLink'] = ['label' => 'Панель упраления', 'url' => '/hr', 'title' => 'Панель управления модулем найма'];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Projects'), 'url' => ['index']];

?>
<div class="project-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
