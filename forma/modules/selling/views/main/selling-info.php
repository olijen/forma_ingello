<?php
use yii\widgets\Pjax;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use forma\modules\selling\widgets\NomenclatureView;
use forma\modules\selling\widgets\HistoryView;
;
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
<h2 class="text-center"><?=$selling->name?></h2>
<div class="selling_info">
    <?php Pjax::begin() ?>
    <p>Состояние заказа: <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="<?=$state->description?>">
            <?=$state->name?></button></p>
    <div class="bs-example">
        <div class="detached-block-example">Ваши данные</div>
        <div class="customer_info">
            <p><span class="user_info_point">Ваше имя:</span> <?=$customer->name?></p>
            <p><span class="user_info_point">Ваше государство:</span> <?=$customer->country->name?></p>
            <p><span class="user_info_point">Ваш адрес:</span> <?=$customer->address?></p>
            <p><span class="user_info_point">E-mail личный:</span> <?=$customer->chief_email?></p>
            <p><span class="user_info_point">E-mail компании:</span> <?=$customer->company_email?></p>
            <p><span class="user_info_point">Телефон личный:</span> <?=$customer->chief_phone?></p>
            <p><span class="user_info_point">Телефон компании:</span> <?=$customer->company_phone?></p>
            <p><span class="user_info_point">Сайт компании:</span> <?=$customer->site_company?></p>
        </div>
    </div>
    <div class="change_email bs-example" style="margin-bottom: 20px">
        <div class="detached-block-example">Сменить e-mail</div>
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
            email_form.style.display = 'block'
            count++;
        }
        else {
            email_form.style.display = 'none';
            count--;
        }
    }
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>