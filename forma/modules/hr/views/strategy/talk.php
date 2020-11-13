<?php

use forma\modules\core\widgets\DetachedBlock;


$this->title = 'Разговор';
?>

<div class="row">
    <div class="col-md-6">

        <?php $strategyList = \forma\modules\selling\records\strategy\Strategy::getList() ?>
        <?= \yii\helpers\Html::beginForm(['talk/'], 'post', ['name' => 'strategyForm']); ?>
        <div class="form-group">
            <?= \yii\helpers\Html::label('Выбирете стратегию') ?>

            <?= \yii\helpers\Html::dropDownList('select', '', $strategyList, ['class' => 'form-control', 'name' => 'selectStrategy']); ?>

            <?= \yii\helpers\Html::input('hidden', 'id', $selling->id) ?>
        </div>
        <?php if (count($strategyList) != 0) {
            echo \yii\helpers\Html::submitButton('Начать разговор', ['class' => 'btn btn-success', 'name' => 'strategyForm']);
        } else {
            echo \yii\helpers\Html::a('Создать скрипт диалога', '/selling/speech-module', ['class' => 'btn btn-success']);
        }
        ?>

        <?= \yii\helpers\Html::endForm() ?>
    </div>
    <div class="col-md-6">
        <?php DetachedBlock::begin(); ?>
        <div class="form-group">
            <label for="status">Статус</label>
            <input class="form-control" id="status" type="text"
                   placeholder="<?= $selling->getWorker()->one()->status ?>" readonly>
        </div>
        <div class="form-group">
            <label for="name">Имя</label>
            <input class="form-control" id="name" type="text" placeholder="<?= $selling->getWorker()->one()->name ?>"
                   readonly>
        </div>
        <div class="form-group">
            <label for="surname">Фамилия</label>
            <input class="form-control" id="surname" type="text"
                   placeholder="<?= $selling->getWorker()->one()->surname ?>" readonly>
        </div>
        <div class="form-group">
            <label for="patronymic">Отчество</label>
            <input class="form-control" id="patronymic" type="text"
                   placeholder="<?= $selling->getWorker()->one()->patronymic ?>" readonly>
        </div>
        <div class="form-group">
            <label for="date_birth">Дата рождения</label>
            <input class="form-control" id="date_birth" type="text"
                   placeholder="<?= $selling->getWorker()->one()->date_birth ?>" readonly>
        </div>
        <div class="form-group">
            <label for="gender">Пол</label>
            <input class="form-control" id="gender" type="text"
                   placeholder="<?= $selling->getWorker()->one()->gender ?>" readonly>
        </div>
        <div class="form-group">
            <label for="passport">Код паспорта</label>
            <input class="form-control" id="passport" type="text"
                   placeholder="<?= $selling->getWorker()->one()->passport ?>" readonly>
        </div>
        <div class="form-group">
            <label for="apply_position">Притендует на вакансию</label>
            <input class="form-control" id="apply_position" type="text"
                   placeholder="<?= $selling->getWorker()->one()->apply_position ?>" readonly>
        </div>
        <div class="form-group">
            <label for="experience">Рабочий стаж </label>
            <input class="form-control" id="experience" type="text"
                   placeholder="<?= $selling->getWorker()->one()->experience ?>" readonly>
        </div>
        <div class="form-group">
            <label for="experience_description">Описание рабочего стажа </label>
            <?= $selling->getWorker()->one()->experience_description ?>
        </div>
        <?php DetachedBlock::end(); ?>
    </div>
</div>

