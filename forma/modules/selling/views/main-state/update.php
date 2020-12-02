<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\state\State */
/* @var $toState forma\modules\selling\records\state\StateToState */

$this->title = Yii::t('app', 'Состояние "{name}"', [
    'name' => $model->name,
]);

$userStates = \forma\modules\selling\records\state\State::find()
    ->where(['user_id' => Yii::$app->user->id])
    ->andWhere('id != :id', ['id' => $_GET['id']])
    ->all();

$userStatesArr = \yii\helpers\ArrayHelper::map($userStates, 'id', 'name');

$confirmedStateToState = \forma\modules\selling\records\state\StateToState::find()
    ->where(['state_id' => $_GET['id']])->all();

$confirmedStateToStateIds = [];

foreach ($confirmedStateToState as $state)
    $confirmedStateToStateIds[] = $state->to_state_id;

Yii::debug($confirmedStateToStateIds);


$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Состояния'), 'url' => ['index']];
?>
    <style>
        .state_to_state {
            border: 1px solid #4526e8;
            margin-bottom: 5px;
            padding: 5px;
        }
    </style>

<?php $form = ActiveForm::begin(); ?>
<?php Pjax::begin(); ?>

    <div class="col-md-12 block">
        <div class="col-md-6">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'order')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'description')->widget(Widget::className(), [
            'settings' => [
                'lang' => 'ru',
                'minHeight' => 200,
                'plugins' => [
                    'clips',
                    'fullscreen',
                    'imagemanager',
                    'filemanager',
                ],
                'clips' => [
                    ['Lorem ipsum...', 'Lorem...'],
                    ['red', '<span class="label-red">red</span>'],
                    ['green', '<span class="label-green">green</span>'],
                    ['blue', '<span class="label-blue">blue</span>'],
                ],
                'imageUpload' => \yii\helpers\Url::to(['/worker/worker/image-upload']),
                'imageManagerJson' => \yii\helpers\Url::to(['/worker/worker/images-get']),
                'fileManagerJson' => \yii\helpers\Url::to(['/worker/worker/files-get']),
                'fileUpload' => \yii\helpers\Url::to(['/worker/worker/file-upload'])
            ],
        ]); ?>
        </div>
        <div class="col-md-6">
            <p style="font-size: 14px; font-weight:bold; margin: 0;">Вы можете настроить переход в следующие состояния</p>
        <?php
        $stateIndex = 0;
        foreach ($userStates as $state) :
            $stateIndex++;?>
            <div class="state_to_state">
                <input <?=(in_array($state->id, $confirmedStateToStateIds)?'checked':'')?> type="checkbox" name="StateToState[<?=$stateIndex?>]" value="<?=$state->id?>">
                <label for="StateToState[<?=$stateIndex?>]"><?=$state->name?></label>
            </div>

        <?php endforeach; ?>
        </div>
        <div class="row"></div>
        <div class="col-md-6">
              <div class="form-group">
                  <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
                  <?= Html::a(Yii::t('app', 'Назад'), ['index'], ['class' => 'btn btn-success']) ?>
              </div>
        </div>
    </div>

    </div>

<?php Pjax::end(); ?>
<?php ActiveForm::end(); ?>


<?php $form = ActiveForm::begin(); ?>
<?php Pjax::begin(); ?>

    <div class="col-md-6 block" style="display: none">
        <input type="hidden" id="statesearchstate-state_id" class="form-control" name="StateSearchState[state_id]"
               value="<?= $model->id ?>">

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

        <?php
        $stateIndex = 0;
        foreach ($userStates as $state) :
            $stateIndex++;?>
            <input <?=(in_array($state->id, $confirmedStateToStateIds)?'checked':'')?> type="checkbox" name="StateToState[<?=$stateIndex?>]" value="<?=$state->id?>">
            <label for="StateToState[<?=$stateIndex?>]"><?=$state->name?></label>
            <br>
        <?php endforeach; ?>


        <?= $form->field($toState, 'to_state_id')
            ->dropDownList($userStatesArr)
        ?>

      <div class="form-group" style="padding-down: 115px">
          <?= Html::submitButton(Yii::t('app', 'Добавить вариант перехода'), ['class' => 'btn btn-success']) ?>
      </div>

      <?php \yii\widgets\Pjax::end(); ?>


    </div>


<?php Pjax::end(); ?>
<?php ActiveForm::end(); ?>