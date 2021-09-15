<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\hr\records\interviewstate\InterviewState */

$this->title = 'Создать Состояние';
$this->params['breadcrumbs'][] = ['label' => 'Состояния', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interview-state-create">

    <?php BoxWidget::begin([
    'title'=>'Состояние: форма добавления',
    ]);
    ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?php BoxWidget::end();?>

</div>
