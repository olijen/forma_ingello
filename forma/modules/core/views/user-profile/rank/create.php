<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\Rank */

$this->title = 'Создать Ранг';
$this->params['breadcrumbs'][] = ['label' => 'Ранги', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rank-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


</div>
