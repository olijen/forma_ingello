<?php

use vova07\imperavi\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\project\records\projectvacancy\ProjectVacancy */
/* @var $form yii\widgets\ActiveForm */
/* @var $projectVacancyModel \forma\modules\project\records\projectvacancy\ProjectVacancy*/
/* @var $vacancyModel \forma\modules\vacancy\records\Vacancy*/
?>

<div class="project-vacancy-form">
<?php if ($projectVacancyModel == [] && $vacancyModel == []):?>
    <?php $form = ActiveForm::begin(); ?>
    <?php if (\forma\modules\project\records\project\Project::getList() !== []): ?>
    <div class="col-md-3 form-group">

    <?= $form->field($model, 'project_id')->textInput()->dropDownList(\yii\helpers\ArrayHelper::map(\forma\modules\project\records\project\Project::getList(true), 'id', 'name' ),  ['value' => $model->isNewRecord ? $id : null ] ) ?>
    </div>
    <div class="col-md-3 form-group">
    <?= $form->field($model, 'vacancy_id')->textInput()->dropDownList(\yii\helpers\ArrayHelper::map(\forma\modules\vacancy\records\Vacancy::getList(true), 'id', 'name' ), ['value' => $model->isNewRecord ? $vacancy_id : null]) ?>
    </div>
    <div class="col-md-2 form-group">
    <?= $form->field($model, 'count')->textInput(['type' => 'number']) ?>
    </div>
    <div class="col-md-12 form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
        <?= $model->isNewRecord ? '' : Html::a('Начать найм ', \yii\helpers\Url::to(['/hr/form/index', 'project_id' => $model->project_id, 'vacancy_id' => $model->vacancy_id]), ['class' => 'btn btn-success']) ?>
    </div>
    <?php else: ?>
    <div class="col-md-3 form-group">
        <p>У вас нет ни одного проекта!</p>
<?= Html::a('Создать проект', Url::to('/project/project/create?r=t'), ['class' => 'btn btn-primary'])?>
    </div>
    <?php endif;?>
    <?php ActiveForm::end(); ?>
<?php else:?>
    <div class="vacancy-form">
    <?php
    $formOptions = [
        'id' => 'vacancy-form',
    ];
    if (Yii::$app->request->isAjax) {
        $formOptions['options'] = [
            'class' => 'select-modal-form',
        ];
    }
    ?>
        <?php
        $form = ActiveForm::begin($formOptions);
        ?>
        <div class="row">
            <div class="col-md-12 block">
                <?= $form->field($projectVacancyModel, 'project_id')
                    ->dropDownList(\forma\modules\project\records\project\Project::getList())
                    ->label('Проект')
                ?>
                <?= $form->field($vacancyModel, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($vacancyModel, 'rate')->textInput(['type' => 'number']) ?>

                <?= $form->field($vacancyModel, 'description')->widget(Widget::className(), [
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
                <?= $form->field($projectVacancyModel, 'count')->textInput(['type' => 'number']) ?>
            </div>
        </div>

        <div class="form-group text-center">
            <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>

<?php endif;?>
</div>
