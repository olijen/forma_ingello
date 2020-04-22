<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model forma\modules\project\records\projectuser\ProjectUser */

$this->title = Yii::t('app', 'Create Project User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Project Users'), 'url' => ['index']];

?>
<div class="project-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
