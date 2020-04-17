<?php
?>

<div class="row">
    <?php \forma\modules\core\widgets\DetachedBlock::begin() ?>
    <div class="form-group">
        <?=\yii\helpers\Html::a('Быстрое добавление', ['/selling/answer/fast-create'], ['class' => 'btn btn-block btn-danger' ]) ?>
    </div>
    <div class="form-group">
        <?=\yii\helpers\Html::a('Смотреть ответы', ['/selling/answer'], ['class' => 'btn btn-block btn-success' ]) ?>
    </div>
    <div class="form-group">
        <?=\yii\helpers\Html::a('Смотреть вопросы', ['/selling/request'], ['class' => 'btn btn-block btn-success' ]) ?>
    </div>
    <div class="form-group">
        <?=\yii\helpers\Html::a('Смотреть стратегий', ['/selling/strategy'], ['class' => 'btn btn-block btn-success' ]) ?>
    </div>
    <div class="form-group">
        <?=\yii\helpers\Html::a('Связать вопрос и стратегию', ['/selling/request-strategy'], ['class' => 'btn btn-block btn-success' ]) ?>
    </div>
    <?php \forma\modules\core\widgets\DetachedBlock::end() ?>
</div>
