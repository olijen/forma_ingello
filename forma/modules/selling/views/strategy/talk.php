<?php
use forma\modules\core\widgets\DetachedBlock;



?>

<div class="row">
    <div class="col-md-6">


        <?= \yii\helpers\Html::beginForm(['talk/'], 'post', ['name' => 'strategyForm']);?>
        <div class="form-group">
            <?= \yii\helpers\Html::label('Выбирете стратегию') ?>
            <?= \yii\helpers\Html::dropDownList('select', '' , \forma\modules\selling\services\StrategyService::getList(), ['class' => 'form-control', 'name' => 'selectStrategy']) ?>
            <?= \yii\helpers\Html::input('hidden', 'id', $selling->id)?>
        </div>
        <?= \yii\helpers\Html::submitButton('Начать разговор', ['class' => 'btn-success', 'name' => 'strategyForm']) ?>


        <?= \yii\helpers\Html::endForm() ?>
    </div>
    <div class="col-md-6">
        <?php DetachedBlock::begin(); ?>
            <div class="form-group">
                <label for="name">Имя</label>
                <input class="form-control" id="name" type="text" placeholder="<?=$selling->getCustomer()->one()->name?>" readonly>
            </div>
            <div class="form-group">
                <label for="firm">Фирма</label>
                <input class="form-control"  id="firm" type="text" placeholder="<?=$selling->getCustomer()->one()->firm?>" readonly>
            </div>
            <div class="form-group">
                <label for="country">Страна</label>
                <input class="form-control" id="country" type="text" placeholder="<?=$selling->getCustomer()->one()->getCountry()->one()->name?>" readonly>
            </div>
            <div class="form-group">
                <label for="address">Адрес</label>
                <input class="form-control" id="address" type="text" placeholder="<?=$selling->getCustomer()->one()->address?>" readonly>
            </div>
            <div class="form-group">
                <label for="chief_email">Email ЛПР</label>
                <input class="form-control" id="email" type="text" placeholder="<?=$selling->getCustomer()->one()->chief_email?>" readonly>
            </div>
            <div class="form-group">
                <label for="email">Email компании</label>
                <input class="form-control" id="email" type="text" placeholder="<?=$selling->getCustomer()->one()->chief_email?>" readonly>
            </div>
            <div  class="form-group">
                <label for="chief_phone">Номер телефона ЛПР</label>
                <input class="form-control" id="phone" type="text" placeholder="<?=$selling->getCustomer()->one()->chief_phone?>" readonly>
            </div>
            <div  class="form-group">
                <label for="phone">Номер телефона компании</label>
                <input class="form-control" id="phone" type="text" placeholder="<?=$selling->getCustomer()->one()->company_phone?>" readonly>
            </div>
        <?php DetachedBlock::end(); ?>
    </div>
</div>

