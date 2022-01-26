<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\AccessInterface */

$this->title = 'Редактировать Интерфейс доступа: ' . ' ' . $model->rule->rule_name;
$this->params['breadcrumbs'][] = ['label' => 'Интерфейсы доступа', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="access-interface-update">



    <?= $this->render('_form', [
    'model' => $model,
        'rules'=>$rules,
        'users'=>$users,
    ]) ?>


</div>
