<?php

use yii\bootstrap\Html;
use yii\widgets\Pjax;
if (!isset($dialog_block)) $dialog_block = '';
?>
<div class="<?=$dialog_block?>" id="dialog">
    <?php Pjax::begin(['enablePushState' => false]) ?>
    <?= $model->dialog ?>
    <?= $form = Html::beginForm(['talk/comment-history'], 'post', ['data-pjax' => '', 'class' => 'form-inline']); ?>
    <div class="form-group">
        <?= Html::textarea('comment', '', ['rows' => 5, 'placeholder' => 'Оставьте комментарий к диалогу']) ?>
    </div>
    <?= Html::input('hidden', 'id', $model->id, ['rows' => 5]) ?>
    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success'])?>
    </div>
    <?= Html::endForm() ?>
    <?php Pjax::end() ?>
</div>