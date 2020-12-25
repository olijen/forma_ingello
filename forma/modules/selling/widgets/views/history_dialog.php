<?php

use yii\bootstrap\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;

?>
<style>
    #chat{
        overflow-x: scroll;
        max-height: 150px;
    }
</style>

<script>
    var heightForScroll = 10;
</script>

<div class="" id="dialog">

    <?= $form = Html::beginForm(['talk/comment-history'], 'post', ['data-pjax' => '1', 'class' => 'form-inline', 'id' => 'history_form']); ?>
    <?php Pjax::begin(['enablePushState' => false, 'id' => 'history_chat']) ?>

    <script>

      console.log('update');
      var div = $("#chat");
      div[0].scrollTop = heightForScroll;

    </script>

    <div id="chat">
        <?= $model->dialog ?? 'История сообщений пуста' ?>
    </div>

    <?php Pjax::end() ?>

    <div>
        <?php
        echo \vova07\imperavi\Widget::widget([
            'name' => 'comment',
            'settings' => [
                'lang' => 'ru',
                //'minHeight' => 300,
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

        <button type="submit" class="btn no-loader btn-success"><i class="fa fa-paper-plane"></i> Отправить</button>

    </div>

    <?= Html::input('hidden', 'id', $model->id, ['rows' => 5]) ?>
    <?= Html::input('hidden', 'selling_token', isset($_GET['selling_token']) ? $_GET['selling_token'] : null) ?>

    <?= Html::endForm() ?>

    <script>

        var div = $("#chat");

        $('#history_form').on('submit', (e) => {
            document.getElementsByClassName('redactor-editor')[0].textContent = '';
            heightForScroll = div[0].scrollHeight;
            e.preventDefault();
            $.pjax({
              type:'POST', 
              url:'/selling/talk/comment-history',
              container:'#history_chat',
              data:$(e.target).serialize(),
              push: false,
              replace: false,
              timeout: 10000,
              scrollTo: $('#chat').offset(),

            }).done(function () {});
        });

        function updateList() {
          if ($("#chat").prop('scrollHeight') - $("#chat").prop('scrollTop') === $("#chat").prop('clientHeight')) {
            heightForScroll = div[0].scrollHeight;
          }
          else heightForScroll = div[0].scrollTop;
            $.pjax({
              type:'POST', 
              url:'/selling/talk/comment-history',
              container:'#history_chat',
              data: $('#history_form')[0][0].name
                +"="+$('#history_form')[0][0].value
                +"&id="+$('#history_form')[0][3].value+"&comment=&selling_token=<?=isset($_GET['selling_token'])?$_GET['selling_token']:null?>",
              push: false,
              replace: false,
              timeout: 10000,
              scrollTo: $('#chat').offset()
            });


        }
        setInterval(updateList, 4000);


        div.scrollTop(div.prop('scrollHeight'));
        //console.log(div[0].scrollTop);
    </script>

</div>
