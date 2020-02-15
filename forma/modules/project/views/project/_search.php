<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\project\records\project\ProjectSearch */
/* @var $form yii\widgets\ActiveForm */

?>

<?php Modal::begin([
    'header' => '<h2>Поиск по параметрам</h2>',
    'id' => 'search',
    'toggleButton' => [
        'label' => '<i class="fa fa-search"></i> Поиск',
        'class' => 'btn btn-success'
    ],
]);
?>

<div class="project-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'state')->dropDownList([
        '' => 'Все',
        '1' => 'В работе',
        '2'=>'Закрыт'
    ]); ?>

    <?= $form->field($model, 'address') ?>

    <?= $form->field($model, 'description') ?>

    <?= Html::submitButton(Yii::t('app', 'Искать'), [
        'class' => 'btn btn-primary',
        //'data-dismiss' => 'modal',
        //'aria-hidden' => 'true',
        'onclick' => "$('#search').modal('hide');",
    ]) ?>

    <?php ActiveForm::end(); ?>

</div>

<?php Modal::end(); ?>
