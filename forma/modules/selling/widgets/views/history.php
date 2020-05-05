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

?>

<?php DetachedBlock::begin(['example' => 'Комунникация']); ?>
    <div class="row">

    <div class="" id="dialog">

        <?php Pjax::begin(['enablePushState' => false]) ?>



        <?= $form = Html::beginForm(['talk/comment-history'], 'post', ['data-pjax' => '', 'class' => 'form-inline']); ?>
        <div>
            <?php
            echo \vova07\imperavi\Widget::widget([
                'name' => 'comment',
                'settings' => [
                    'lang' => 'ru',
                    //'minHeight' => 200,
                    'plugins' => [
                        'clips',
                        'fullscreen',
                        'imagemanager',
                        'filemanager',
                    ],
                    'clips' => [
                        ['Оставьте комментарий, картинку или файл...', 'Текст...'],
                        ['red', '<span class="label-red">red</span>'],
                        ['green', '<span class="label-green">green</span>'],
                        ['blue', '<span class="label-blue">blue</span>'],
                    ],
                    'imageUpload' => \yii\helpers\Url::to(['/worker/worker/image-upload']),
                    'imageManagerJson' => \yii\helpers\Url::to(['/worker/worker/images-get']),
                    'fileManagerJson' => \yii\helpers\Url::to(['/worker/worker/files-get']),
                    'fileUpload' => \yii\helpers\Url::to(['/worker/worker/file-upload'])
                ],
            ]);
            ?>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Добавить', ['class' => 'btn btn-success'])?>
        </div>

        <div id="chat" style="max-height: 200px; overflow-x: auto;">
            <?= $model->dialog ?? 'История сообщений пуста' ?>
          <br>
          <br>
        </div>
        <?= Html::input('hidden', 'id', $model->id, ['rows' => 5]) ?>

        <?= Html::endForm() ?>

        <?php Pjax::end() ?>
    </div>

<?php DetachedBlock::end() ?>

<!--<script>
  var div = $("#chat");
  div.scrollTop(div.prop('scrollHeight'));
</script>
-->