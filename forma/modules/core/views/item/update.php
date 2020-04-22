<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\Item */

$this->title = Yii::t('app', 'Редактировать пункт: {name}', [
    'name' => $model->title,
]);

$this->params['breadcrumbs'][] = Yii::t('app', 'Настроить');
?>


    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


