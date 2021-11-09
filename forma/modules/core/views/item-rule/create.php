<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\ItemRule */

$this->title = 'Создать Правило элемента';
$this->params['breadcrumbs'][] = ['label' => 'Правила элементов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-rule-create">

    <?php BoxWidget::begin([
    'title'=>'Правило элемента: форма добавления',
    ]);
    ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?php BoxWidget::end();?>

</div>
