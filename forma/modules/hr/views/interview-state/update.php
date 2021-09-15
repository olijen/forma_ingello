<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\hr\records\interviewstate\InterviewState */

$this->title = 'Редактировать Состояние: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Состояния', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="interview-state-update">

    <?php BoxWidget::begin([
    'title'=>'Состояние: форма редактирования',
    ]);
    ?>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

    <?php BoxWidget::end();?>

</div>
