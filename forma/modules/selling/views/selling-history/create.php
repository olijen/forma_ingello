<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\sellinghistory\SellingHistory */

$this->title = 'Создать Историю продаж';
$this->params['breadcrumbs'][] = ['label' => 'Истории продаж', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="selling-history-create">

    <?php BoxWidget::begin([
    'title'=>'История продаж: форма добавления',
    ]);
    ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?php BoxWidget::end();?>

</div>
