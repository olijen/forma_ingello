<?php
use yii\widgets\Pjax;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>


<style>
    .selling_info{
        margin: 0 auto;
        width: 80vw;
    }
</style>
<?php Pjax::begin() ?>
<h1 class="text-center">Информация по продаже</h1>
<hr>
<h2 class="text-center"><?=$selling->name?></h2>
<div class="selling_info">
    <p>Состояние заказа: <?=$state->name?></p>
    <div class="customer_info">
        <h3>Ваши данные</h3>
        <p>Ваши лд мы особенно точно не передадим левым третьим лицам, чьи руки перенесут их в Даркнет</p>
        <p>Ваше имя: <?=$customer->name?></p>
        <p>Ваше государство: <?=$customer->country->name?></p>
        <p>Ваш адрес(за вами уже выехали): <?=$customer->address?></p>
        <p>E-mail личный: <?=$customer->chief_email?></p>
        <p>E-mail компании: <?=$customer->company_email?></p>
        <p>Телефон личный: <?=$customer->chief_phone?></p>
        <p>Телефон компании: <?=$customer->company_phone?></p>
        <p>Сайт компании: <?=$customer->site_company?></p>
    </div>
    <div class="change_email">
        <button id="change_email">Сменить e-mail</button>
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
</div>
<?php Pjax::end() ?>


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
