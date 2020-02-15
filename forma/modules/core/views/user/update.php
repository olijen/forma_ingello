<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\User */

$this->title = 'Изменить пользователя: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Люди', 'url' => '/core/default/people'];
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="user-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
