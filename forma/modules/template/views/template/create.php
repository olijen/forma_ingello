<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\template\records\Template */

$this->title = 'Создать Шаблон';
$this->params['breadcrumbs'][] = ['label' => 'Шаблон', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="template-create">

    <?php BoxWidget::begin([
    'title'=>'Шаблон: форма добавления',
    ]);
    ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?php BoxWidget::end();?>

</div>
