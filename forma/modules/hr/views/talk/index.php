<?php

use kartik\select2\Select2;
use forma\modules\core\widgets\DetachedBlock;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use vova07\imperavi\Widget;
use yii\helpers\Html;

\forma\modules\hr\assets\ScriptAsset::register($this);

?>
<?php \forma\components\widgets\ModalCreate::begin() ?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <div class="row">
        <div class="col-md-6">
            <div class="row list-request-answer " style="margin-top: 15px">
                <div class="header-list text-center">
                       <span class="header-name">Скрипты</span>
                </div>
                <ul class="list-group parent-list">
                <?php foreach ($model as $request ): ?>
                    <li id="<?= $request->id ?>" class="list-group-item d-flex justify-content-between align-items-center selected-item">
                        <input id ="checkbox_<?= $request->id ?>" class="form-check-input checkbox-item" type="checkbox" value=""   disabled>
                        <?= $request->text ?>
                        <span class="badge badge-primary badge-pill"><?=\forma\modules\hr\services\AnswerService::getCountAnswer($request)?></span>
                    </li>
                    <div  id="children_<?= $request->id ?>" class="hidden-block-selected">
                        <ul class="list-group" >
                            <?php foreach ($request->getAnswers()->all() as $answer): ?>
                            <li  class="list-group-item " >
                                <p id="children_item_<?= $answer->id ?>" class="text-answer" data-request="<?=$request->id?>"><?= $answer->text ?></p>
                            </li>
                           <?php endforeach; ?>
                            <li class="list-group-item" ><button id="no_usage_answer_<?= $request->id ?> " data-requset-no-useg="<?= $request->id ?>"  class="btn-danger  no-usage-btn">Не использовал</button></li>
                        </ul>
                    </div>
                <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <?php DetachedBlock::begin(); ?>
                <?php $form = ActiveForm::begin([
                        'action' => '/hr/talk/end-talk',
                        'id' => 'form-customer',
                        ]) ?>

            <?= $form->field($worker, 'status')->textInput()->dropDownList(['0' => 'Свободен', '1' =>'В работе'])->label('Статус занятости') ?>
            <?= $form->field($worker, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($worker, 'surname')->textInput(['maxlength' => true]) ?>

            <?= $form->field($worker, 'patronymic')->textInput(['maxlength' => true]) ?>

            <?= $form->field($worker, 'date_birth')->textInput(['type' => 'date']) ?>

            <?= $form->field($worker, 'gender')->textInput()->radioList(['0' => 'М', '1' => 'Ж']) ?>

            <?= $form->field($worker, 'passport')->textInput(['maxlength' => true]) ?>

            <?= $form->field($worker, 'apply_position')->textInput(['maxlength' => true]) ?>

            <?= $form->field($worker, 'experience')->textInput(['type' => 'number']) ?>

            <?= $form->field($worker, 'experience_description')->widget(Widget::className(), [
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
            <div class="col-xs-12 text-center">
                <div class="panel panel-default">
                    <div class="panel-heading">Интересующие вакансии</div>
                    <div class="panel-body">

                        <?= $form->field($worker, 'workerVacancies')->widget(Select2::className(), [
                            'data' =>  \forma\modules\worker\records\workervacancy\WorkerVacancy::getListVacancies(),
                            'options' => [
                                'placeholder' => 'Выберете вакансии...',
                                'multiple' => true,
                                'pluginOptions' => [
                                    'tags' => true,
                                ],

                            ],
                        ])->label(false) ?>

                    </div>
                </div>
            </div>
                <?php ActiveForm::end()?>
                <div class="form-group">
                    <label for="comment">Комментарий к диалогу</label>
                    <textarea class="form-control" rows="5" name="comment" id="<?=$sellingId?>_comment"></textarea>
                </div>
                <form id="custom-answer" action="/selling/talk/end-talk" name="end-talk" method="post">
                    <input id="sellingId" type="hidden" value="<?=$sellingId?>" name="endTalk">
                    <ul class="list-group" id="no-usage-list">

                    </ul>
                    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>">

                </form>
            <label for="next_step">Следуйщий шаг</label>
            <input type="text" name="next_step" id="next_step" class="form-control">
            <div class="form-group" style="margin-top: 10px">
                <button class="btn-success" type="submit" id="end-talk">
                    Завершить разгавор
                </button>
            </div>
            <?php DetachedBlock::end(); ?>
        </div>
    </div>
<?php \forma\components\widgets\ModalCreate::end() ?>
