<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\UserRuleRank */

$this->title = 'Редактировать Условие ранга пользователя: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Условия рангов пользователя', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="user-rule-rank-update">

    <?php BoxWidget::begin([
    'title'=>'Условие ранга пользователя: форма редактирования',
    ]);
    ?>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

    <?php BoxWidget::end();?>

</div>
