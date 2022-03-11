<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\hr\records\volunteer\Volunteer */

$this->title = 'Создать Валантера';
$this->params['breadcrumbs'][] = ['label' => 'Волонтеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="volunteer-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
