<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\customersource\CustomerSource */

$this->title = 'Создать Источник клиента';
$this->params['breadcrumbs'][] = ['label' => 'Источники клиента', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-source-create">

    <?php BoxWidget::begin([
    'title'=>'Источник клиента: форма добавления',
    ]);
    ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?php BoxWidget::end();?>

</div>
