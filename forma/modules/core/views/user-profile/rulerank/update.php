<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\RuleRank */

$this->title = 'Редактировать Условие ранга: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Условия рангов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="rule-rank-update">

    <?php BoxWidget::begin([
    'title'=>'Условие ранга: форма редактирования',
    ]);
    ?>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

    <?php BoxWidget::end();?>

</div>
