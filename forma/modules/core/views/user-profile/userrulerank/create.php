<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\UserRuleRank */

$this->title = 'Создать Условие ранга пользователя';
$this->params['breadcrumbs'][] = ['label' => 'Условия рангов пользователя', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-rule-rank-create">

    <?php BoxWidget::begin([
    'title'=>'Условие ранга пользователя: форма добавления',
    ]);
    ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?php BoxWidget::end();?>

</div>
