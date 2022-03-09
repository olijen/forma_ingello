<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\hr\records\volunteer\Volunteer */

$this->title = 'Редактировать Валантера: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Волонтеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="volunteer-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
