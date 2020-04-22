<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\event\records\Event */

$this->title = 'Создать Событие';
$this->params['breadcrumbs'][] = ['label' => 'События', 'url' => ['index']];

?>
<div class="event-create">
    
    <?php BoxWidget::begin([
    'title'=>'Событие: форма добавления',
    ]);
    ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?php BoxWidget::end();?>

</div>
