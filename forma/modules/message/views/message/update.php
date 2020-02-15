<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\message\records\Message */

$this->title = 'Редактировать Сообщение: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Сообщения', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="message-update">

    <?php BoxWidget::begin([
    'title'=>'Сообщение: форма редактирования',
    ]);
    ?>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

    <?php BoxWidget::end();?>

</div>
