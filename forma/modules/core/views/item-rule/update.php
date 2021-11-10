<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\ItemRule */

$this->title = 'Редактировать Правило элемента: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Правила элементов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="item-rule-update">

    <?php BoxWidget::begin([
    'title'=>'Правило элемента: форма редактирования',
    ]);
    ?>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

    <?php BoxWidget::end();?>

</div>
