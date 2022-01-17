<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\ItemInterface */

$this->title = 'Создать Интерфейс';
$this->params['breadcrumbs'][] = ['label' => 'Интерфейсы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-interface-create">

    <?php BoxWidget::begin([
    'title'=>'Интерфейс: форма добавления',
    ]);
    ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?php BoxWidget::end();?>

</div>
