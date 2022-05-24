<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\Rule */

$this->title = 'Создать Правило';
$this->params['breadcrumbs'][] = ['label' => 'Правила', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rule-create">


    <?= $this->render('_form', [
        'model' => $model,
        'tables'=>$tables,
        'items'=>$items,
    ]) ?>



</div>
