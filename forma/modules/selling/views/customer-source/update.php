<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\customersource\CustomerSource */

$this->title = 'Редактировать Источник клиента: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Источники клиента', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="customer-source-update">

    <?php BoxWidget::begin([
    'title'=>'Источник клиента: форма редактирования',
    ]);
    ?>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

    <?php BoxWidget::end();?>

</div>
