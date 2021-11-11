<?php
use yii\widgets\Pjax;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use forma\modules\selling\widgets\NomenclatureView;
use forma\modules\selling\widgets\HistoryView;

?>


<style>
    .selling_info{
        margin: 0 auto;
        width: 80vw;
    }
    .user_info_point{
        font-weight: bold;
    }
</style>


<h1 class="text-center">Информация по продаже</h1>
<hr>
<h2 class="text-center">Заказ №<?=$selling->id?> <?=$selling->name?></h2>
<div class="selling_info">
    <?php Pjax::begin() ?>
    <p>Состояние заказа: <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="<?=strip_tags($state->description)?>">
            <?=$state->name?></button></p>
    <div class="bs-example">
        <div class="detached-block-example">Ваши данные</div>
        <div class="customer_info">
            <p><span class="user_info_point">Ваше имя:</span> <?=$customer->name?> | <?=$selling->warehouse->name?></p>
            <p><span class="user_info_point">Ваше государство:</span> <?=$customer->country->name??'не задано'?></p>
            <p><span class="user_info_point">Ваш адрес:</span> <?=$customer->address??'не задано'?></p>
            <p><span class="user_info_point">E-mail личный:</span> <?=$customer->chief_email??'не задано'?></p>
            <p><span class="user_info_point">E-mail компании:</span> <?=$customer->company_email??'не задано'?></p>
            <p><span class="user_info_point">Телефон личный:</span> <?=$customer->chief_phone??'не задано'?></p>
            <p><span class="user_info_point">Телефон компании:</span> <?=$customer->company_phone??'не задано'?></p>
            <p><span class="user_info_point">Сайт компании:</span> <?=$customer->site_company??'не задано'?></p>
        </div>
    </div>
    <div class="change_email bs-example" style="margin-bottom: 20px">
        <div class="detached-block-example">Сменить e-mail</div>
        <button id="change_email" class="btn btn-success" style="margin-bottom:10px">Сменить e-mail</button>
        <a href="<?=$googleLink?>" class="btn btn-primary" style="margin-bottom: 10px" > <img style="background: white; height: 18px; padding-bottom: 2px; margin-right: 6px; width:16px" src="/images/google.png" alt="">Сменить e-mail с помощью Google</a>
        <?php $form = ActiveForm::begin([
            'id' => 'email',
            'method' => 'get',
            'layout' => 'horizontal',
            'options' => ['data' => ['pjax' => true], 'method' => 'get'],
            'fieldConfig' => [
                'template' => '<div class="col-md-1" style="padding: 0">{label}:</div><div class="col-md-1"></div><div class="col-md-5">{input}</div><div class="col-md-5">{error}</div>',
            ],
        ]); ?>

        <?= $form->field($customer, 'chief_email')->textInput(['autofocus' => true]) ?>

        <div class="form-group">
            <div class=" col-lg-11">
                <?= Html::submitButton('Сменить e-mail', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>


        <?php ActiveForm::end(); ?>
    </div>
    <?php Pjax::end() ?>

    <?= HistoryView::widget(['model' => $selling, 'talk' => false])?>

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
            change_email.style.marginBottom = '20px';
            email_form.style.display = 'block'
            count++;
        }
        else {
            change_email.style.marginBottom = '0';
            email_form.style.display = 'none';
            count--;
        }
    }
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
