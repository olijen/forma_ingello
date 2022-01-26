<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\ItemInterface */

$this->title = 'Создать Элемент Интерфейса';
$this->params['breadcrumbs'][] = ['label' => 'Элементы Интерфейса', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-interface-create">

    <?php BoxWidget::begin([
    'title'=>'Элемент Интерфейса: форма добавления',
    ]);
    ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?php BoxWidget::end();?>

</div>
