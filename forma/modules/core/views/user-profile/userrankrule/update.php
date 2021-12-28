<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\UserRuleRank */

$this->title = 'Редактировать Правило ранга: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Правила рангов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="user-rule-rank-update">

    <?php BoxWidget::begin([
    'title'=>'Правило ранга: форма редактирования',
    ]);
    ?>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

    <?php BoxWidget::end();?>

</div>
