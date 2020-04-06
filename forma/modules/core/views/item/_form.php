<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\Item */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php Pjax::begin(); ?>

    <div class="col-md-6 block">

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'description')->widget(Widget::className(), [
            'settings' => [
                'lang' => 'ru',
                'minHeight' => 200,
                'plugins' => [
                    'clips',
                    'fullscreen',
                ],
                'clips' => [
                    ['Lorem ipsum...', 'Lorem...'],
                    ['red', '<span class="label-red">red</span>'],
                    ['green', '<span class="label-green">green</span>'],
                    ['blue', '<span class="label-blue">blue</span>'],
                ],
            ],
        ]); ?>


        <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>//TODO вывести в отдельную табличку???

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Добавить'), ['class' => 'btn btn-success']) ?>
        </div>
    </div>


    <?php




    Pjax::end(); ?>
    <?php ActiveForm::end(); ?>

</div>
