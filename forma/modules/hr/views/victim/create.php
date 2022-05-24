<?php

/* @var $this yii\web\View */
/* @var $model forma\modules\hr\models\Victim */

$this->title = 'Создать Пострадавшего';
$this->params['breadcrumbs'][] = ['label' => 'Пострадавшие', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="victim-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
