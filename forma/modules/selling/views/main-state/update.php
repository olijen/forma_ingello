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

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Состояния'), 'url' => ['index']];
?>


<?php $form = ActiveForm::begin(); ?>
<?php Pjax::begin(); ?>

    <div class="col-md-6 block">

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
      <div class="form-group">
          <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
          <?= Html::a(Yii::t('app', 'Назад'), ['index'], ['class' => 'btn btn-success']) ?>
      </div>

    </div>

<?php Pjax::end(); ?>
<?php ActiveForm::end(); ?>


<?php $form = ActiveForm::begin(); ?>
<?php Pjax::begin(); ?>

    <div class="col-md-6 block">
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


        <?= $form->field($toState, 'to_state_id')
            ->dropDownList(\yii\helpers\ArrayHelper::map(\forma\modules\selling\records\state\State::find()
                ->where(['user_id' => Yii::$app->user->id])
                ->andWhere('id != :id', ['id' => $_GET['id']])
                ->all(), 'id', 'name'))
        ?>

      <div class="form-group" style="padding-down: 115px">
          <?= Html::submitButton(Yii::t('app', 'Добавить вариант перехода'), ['class' => 'btn btn-success']) ?>
      </div>

      <?php \yii\widgets\Pjax::end(); ?>


    </div>


<?php Pjax::end(); ?>
<?php ActiveForm::end(); ?>