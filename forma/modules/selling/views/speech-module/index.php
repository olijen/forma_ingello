<?php
$this->title = Yii::t(
        'app', 'Речевые модули'
);
?>

<div class="row">
    <?php \forma\modules\core\widgets\DetachedBlock::begin() ?>
    <div class="form-group">
        <?=\yii\helpers\Html::a('Быстрое добавление', ['/selling/answer/fast-create'], ['class' => 'btn btn-block btn-danger' ]) ?>
    </div>
    <div class="form-group">
        <?=\yii\helpers\Html::a('Смотреть ответы', ['/selling/answer'], ['class' => 'btn btn-block btn-success forma_blue' ]) ?>
    </div>
    <div class="form-group">
        <?=\yii\helpers\Html::a('Смотреть вопросы', ['/selling/request'], ['class' => 'btn btn-block btn-success forma_blue' ]) ?>
    </div>
    <div class="form-group">
        <?=\yii\helpers\Html::a('Смотреть стратегии', ['/selling/strategy'], ['class' => 'btn btn-block btn-success forma_blue' ]) ?>
    </div>
    <div class="form-group">
        <?=\yii\helpers\Html::a('Связать вопрос и стратегию', ['/selling/request-strategy'], ['class' => 'btn btn-block btn-success forma_blue' ]) ?>
    </div>
    <?php \forma\modules\core\widgets\DetachedBlock::end() ?>
</div>
