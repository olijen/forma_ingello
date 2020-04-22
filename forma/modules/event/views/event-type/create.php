<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\event\records\EventType */

$this->title = 'Создать ТипСобытия';
$this->params['breadcrumbs'][] = ['label' => 'ТипыСобытий', 'url' => ['index']];

?>
<div class="event-type-create">

    <?php BoxWidget::begin([
    'title'=>'ТипСобытия: форма добавления',
    ]);
    ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?php BoxWidget::end();?>

</div>
