<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\state\State */
/* @var $toState forma\modules\selling\records\state\StateToState */

$this->title = Yii::t('app', 'Обновите: {name}', [
    'name' => $model->name,
]);

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'States'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>


<?php $form = ActiveForm::begin(); ?>
<?php Pjax::begin(); ?>
    <div class="col-md-5 block">


        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'order')->textInput(['maxlength' => true]) ?>
        <div class="col-md-13 block">

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

        </div>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            <?= Html::a(Yii::t('app', 'Назад'), ['index'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>
<?php Pjax::end(); ?>
<?php ActiveForm::end(); ?>


<?php $form = ActiveForm::begin(); ?>
<?php Pjax::begin(); ?>

    <div class="col-md-7 block" style="padding-left: 115px">
        <input type="hidden" id="statesearchstate-state_id" class="form-control" name="StateSearchState[state_id]"
               value="<?= $model->id ?>">
        <?= $form->field($toState, 'to_state_id')
            ->dropDownList(\yii\helpers\ArrayHelper::map(\forma\modules\selling\records\state\State::find()
                ->where(['user_id' => Yii::$app->user->id])
                ->andWhere('id != :id', ['id' => $_GET['id']])
                ->all(), 'id', 'name'))
        ?>

        <?php \yii\widgets\Pjax::begin(); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $toState,
            'columns' => [
                ['class' => 'yii\grid\ActionColumn',
                    'template' => '{delete}',
                    'controller' => 'state-to-state',
                ],

                'toState.name',
            ],
        ]);
        ?>
        <div class="form-group" style="padding-down: 115px">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            <?php \yii\widgets\Pjax::end(); ?>
        </div>
    </div>


<?php Pjax::end(); ?>
<?php ActiveForm::end(); ?>