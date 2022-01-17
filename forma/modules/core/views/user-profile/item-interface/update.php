<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\ItemInterface */

$this->title = 'Редактировать Интерфейс: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Интерфейсы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="item-interface-update">

    <?php BoxWidget::begin([
    'title'=>'Интерфейс: форма редактирования',
    ]);
    ?>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

    <?php BoxWidget::end();?>

</div>
