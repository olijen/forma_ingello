<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\UserRuleRank */

$this->title = 'Создать Правило ранга';
$this->params['breadcrumbs'][] = ['label' => 'Правила рангов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-rule-rank-create">

    <?php BoxWidget::begin([
    'title'=>'Правило ранга: форма добавления',
    ]);
    ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?php BoxWidget::end();?>

</div>
