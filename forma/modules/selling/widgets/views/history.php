<?php
use yii\bootstrap\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use forma\modules\selling\records\selling\StateConfirm;
use forma\modules\core\widgets\DetachedBlock;
use vova07\imperavi\Widget;

/**
 * @var Selling $model
 */

$dialog_block = 'hidden';

?>

<?php DetachedBlock::begin(['example' => 'Комунникация']); ?>
    <div class="row">
    <div class="col-md-12 form-group">
        <?php if(!is_null($talk)) echo  Html::a('Начать разговор', Url::to('/selling/strategy/talk?id='.$model->id), ['class' => 'btn btn-success', 'id' => 'selling-talk'])?>
        <?= Html::Button('История', ['class' => 'btn btn-success',  'id' => 'openDialog']) ?>
    </div>
    <div class="hidden" id="dialog">

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
    <script>
        var flag = false;

<?php DetachedBlock::end() ?>

<!--<script>
  var div = $("#chat");
  div.scrollTop(div.prop('scrollHeight'));
</script>
-->