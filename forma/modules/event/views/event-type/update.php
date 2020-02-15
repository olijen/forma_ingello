<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\event\records\EventType */

$this->title = 'Редактировать ТипСобытия: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'ТипыСобытий', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="event-type-update">

    <?php BoxWidget::begin([
    'title'=>'ТипСобытия: форма редактирования',
    ]);
    ?>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

    <?php BoxWidget::end();?>

</div>
