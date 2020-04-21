<?php
use yii\widgets\Pjax;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use forma\modules\selling\widgets\NomenclatureView;

use forma\modules\selling\records\selling\Selling;
use forma\modules\selling\widgets\SellingFormView;

use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
?>


<style>
    .selling_info{
        margin: 0 auto;
        width: 80vw;
    }
</style>

<h1 class="text-center">Информация по продаже</h1>
<hr>
<h2 class="text-center"><?=$selling->name?></h2>
<div class="selling_info">
    <?php Pjax::begin() ?>
    <p>Состояние заказа: <button class="btn btn-success"><?=$state->name?></button></p>
    <div class="bs-example">
        <div class="detached-block-example">Ваши данные</div>
        <div class="customer_info">
            <table>
                <tr style="">
                    <td style="width: 400px;">Ваше имя:</td>
                    <td><?=$customer->name?></td>
                </tr>
                <tr>
                    <td>Ваше государство:</td>
                    <td><?=$customer->country->name?></td>
                </tr>
                <tr>
                    <td>Ваш адрес:</td>
                    <td><?=$customer->address?></td>
                </tr>
                <tr>
                    <td>E-mail личный:</td>
                    <td><?=$customer->chief_email?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <p> </p>
            <p></p>
            <p></p>
            <p></p>
            <p>E-mail компании: <?=$customer->company_email?></p>
            <p>Телефон личный: <?=$customer->chief_phone?></p>
            <p>Телефон компании: <?=$customer->company_phone?></p>
            <p>Сайт компании: <?=$customer->site_company?></p>
        </div>
    </div>
    <div class="change_email" style="margin-bottom: 20px">
        <button id="change_email" class="btn btn-success">Сменить e-mail</button>
        <?php $form = ActiveForm::begin([
            'id' => 'email',
            'method' => 'get',
            'layout' => 'horizontal',
            'options' => ['data' => ['pjax' => true], 'method' => 'get'],
            'fieldConfig' => [
                'template' => '<div class="col-md-1">{label}</div><div class="col-md-5">{input}</div><div class="col-md-6">{error}</div>',
            ],
        ]); ?>

        <?= $form->field($customer, 'chief_email')->textInput(['autofocus' => true]) ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Сменить e-mail', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
    <?php Pjax::end() ?>

    <div class="row">
        <div class="col-md-12 form-group">
            <?= Html::Button('История', ['class' => 'btn btn-success',  'id' => 'openDialog']) ?>
        </div>
        <div class="hidden" id="dialog">

            <?php Pjax::begin(['enablePushState' => false]) ?>
            <?php if(isset($modelProduct)) var_dump($modelProduct);?>
            <?= $selling->dialog ?>
            <?= $form = Html::beginForm(['talk/comment-history'], 'post', ['data-pjax' => '', 'class' => 'form-inline']); ?>
            <div class="form-group">
                <?= Html::textarea('comment', '', ['rows' => 5, 'placeholder' => 'Оставьте комментарий к диалогу']) ?>
            </div>
            <?= Html::input('hidden', 'id', $selling->id, ['rows' => 5]) ?>
            <div class="form-group">
                <?= Html::submitButton('Добавить', ['class' => 'btn btn-success'])?>
            </div>
            <?= Html::endForm() ?>
            <?php Pjax::end() ?>
        </div>
    </div>

    <?= NomenclatureView::widget(['sellingId' => $selling->id]) ?>
</div>



    <script>
        var flag = false;

        document.getElementById('openDialog').onclick = function () {
            if (flag === false) {
                document.getElementById('dialog').classList.remove('hidden');
                flag = true;
            } else {
                document.getElementById('dialog').classList.add('hidden');
                flag = false;
            }
        }
    </script>


<script>
    let change_email = document.getElementById('change_email');
    let email_form = document.getElementById('email');
    let count = 0;
    email_form.style.display = 'none';
    change_email.onclick = function(){
        if(count == 0){
            email_form.style.display = 'block'
            count++;
        }
        else {
            email_form.style.display = 'none';
            count--;
        }
    }
</script>
