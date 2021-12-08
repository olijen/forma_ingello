<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\sellinghistory\SellingHistory */

$this->title = 'Редактировать Историю продаж: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Истории продаж', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="selling-history-update">

    <?php BoxWidget::begin([
    'title'=>'История продаж: форма редактирования',
    ]);
    ?>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

    <?php BoxWidget::end();?>

</div>
