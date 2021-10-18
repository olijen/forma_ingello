<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\AccessInterface */

$this->title = 'Редактировать Интерфейс доступа: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Интерфейсы доступа', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="access-interface-update">

    <?php BoxWidget::begin([
    'title'=>'Интерфейс доступа: форма редактирования',
    ]);
    ?>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

    <?php BoxWidget::end();?>

</div>
