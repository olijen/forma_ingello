<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\project\records\projectuser\ProjectUser */

$this->title = Yii::t('app', 'Update Project User: ' . $model->project_id, [
    'nameAttribute' => '' . $model->project_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Project Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->project_id, 'url' => ['view', 'project_id' => $model->project_id, 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="project-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
