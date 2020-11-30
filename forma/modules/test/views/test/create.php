<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\test\records\TestTypeField */

$this->title = 'Создать вопрос';
$this->params['breadcrumbs'][] = ['label' => 'Test Type Fields', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-type-field-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
