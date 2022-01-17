<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\ItemInterface */

$this->title = 'Редактировать Элемент Интерфейса: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Элементы Интерфейса', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="item-interface-update">

    <?php BoxWidget::begin([
    'title'=>'Элемент Интерфейса: форма редактирования',
    ]);
    ?>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

    <?php BoxWidget::end();?>

</div>
