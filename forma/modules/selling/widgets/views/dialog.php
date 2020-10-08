<?php

use forma\modules\core\widgets\DetachedBlock;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii2fullcalendar\yii2fullcalendar;
use yii\web\JsExpression;
use forma\modules\core\widgets\CalendarWidget;
use yii\bootstrap\Modal;


\forma\modules\selling\assets\ScriptAsset::register($this);

?>

<?php \forma\components\widgets\ModalCreate::begin() ?>
<style>
    .bs-example {
        margin-top: 0;
    }
</style>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
<div class="row">
    <div class="col-md-6">
        <div class="list-request-answer" >
            <div class="header-list text-center">
                <span class="header-name">Скрипты</span>
            </div>
            <ul class="list-group parent-list">
                <?php foreach ($model as $request ): ?>
                    <li id="<?= $request->id ?>" class="list-group-item d-flex justify-content-between align-items-center selected-item">
                        <input id ="checkbox_<?= $request->id ?>" class="form-check-input checkbox-item" type="checkbox" value=""   disabled>
                        <?= $request->text ?>
                        <span class="badge badge-primary badge-pill"><?=\forma\modules\selling\services\AnswerService::getCountAnswer($request)?></span>
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
            'action' => '/selling/talk/end-talk?sellingId=' . $sellingId,
             'options' => [
                     'class' => 'form-inline',
                     'style' => 'display:inline',
             ],
            'id' => 'form-customer',
        ]) ?>
        <?= $form->field($customer, 'id')->textInput()->hiddenInput()->label(false); ?>
        <?= $form->field($customer, 'name')->textInput()->label('Имя'); ?>
        <?= $form->field($customer, 'firm')->textInput()->label('Фирма'); ?>
        <?= $form->field($customer, 'address')->textInput()->label('Адрес'); ?>
        <?= $form->field($customer, 'chief_email')->textInput()->label('Email ЛПР'); ?>
        <?= $form->field($customer, 'company_email')->textInput()->label('Email компании'); ?>
        <?= $form->field($customer, 'chief_phone')->textInput()->label('Номер телефона ЛПР'); ?>
        <?= $form->field($customer, 'company_phone')->textInput()->label('Номер телефона компании'); ?>
        <?= $form->field($customer, 'site_company')->textInput()->label('Сайт компании'); ?>
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
        <input type="text" name="next_step" id="next_step" class="form-control"><br>

<!--        <input type="submit" name="calendar" class="btn btn-link" value="Выбать дату">-->

            <?php
            Modal::begin([
                'header' => '<h2>Планирование</h2>',
                'toggleButton' => [
                    'label' => 'Выбрать дату',
                    'tag' => 'button',
                    'class' => 'btn btn-success',
                    'onclick'=>'next()',
                ],
            ]);?>
        <script>
            function next() {
                let next_step = document.getElementById("next_step").value;
                console.log(next_step);
            }
            next();
        </script>
        <div id="test"></div>
            <label for="next_step">Следуйщий шаг</label>
        <input type="text" name="next_step" id="next_step" class="form-control"><br>


            <?php
            $form = ActiveForm::begin(['id'=>'contact-form']);
            require_once 'forma/modules/event/views/default/index.php';

            ?>
        <br>
             <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
    </div>
            <?php ActiveForm::end();?>
           <?php Modal::end(); ?>
        <div class="form-group" style="margin-top: 10px">
            <a href="/selling/form" class="btn-success" type="submit" id="end-talk">
                Завершить разгавор
            </a>
        </div>
        <?php DetachedBlock::end(); ?>
    </div>
</div>
<?php \forma\components\widgets\ModalCreate::end() ?>
