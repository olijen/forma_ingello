<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\Rule */

$this->title = 'Редактировать Правило: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Правила', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="rule-update">

    <?php BoxWidget::begin([
    'title'=>'Правило: форма редактирования',
    ]);
    ?>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

    <?php BoxWidget::end();?>

</div>
