<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\message\records\Message */

$this->title = 'Создать Сообщение';
$this->params['breadcrumbs'][] = ['label' => 'Сообщения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-create">

    <?php BoxWidget::begin([
    'title'=>'Сообщение: форма добавления',
    ]);
    ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?php BoxWidget::end();?>

</div>
