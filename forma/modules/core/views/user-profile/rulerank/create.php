<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\RuleRank */

$this->title = 'Создать Условие ранга';
$this->params['breadcrumbs'][] = ['label' => 'Условия рангов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rule-rank-create">

    <?php BoxWidget::begin([
    'title'=>'Условие ранга: форма добавления',
    ]);
    ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?php BoxWidget::end();?>

</div>
