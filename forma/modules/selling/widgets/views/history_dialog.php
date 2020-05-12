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
    var ttt = 10;
</script>

<div class="" id="dialog">

    <?= $form = Html::beginForm(['talk/comment-history'], 'post', ['data-pjax' => '1', 'class' => 'form-inline', 'id' => 'history_form']); ?>
    <?php Pjax::begin(['enablePushState' => false, 'id' => 'history_chat']) ?>

    <div id="chat">

        <?= $model->dialog ?? 'История сообщений пуста' ?>

    </div>
    <script>

        var div = $("#chat");
        div[0].scrollTop = ttt;
    </script>


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

        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success'])?>

        <?= $talk
            ? Html::a('Разговор по скрипту', Url::to('/selling/strategy/talk?id='.$model->id), ['class' => 'btn btn-success', 'id' => 'selling-talk'])
            : ''
        ?>

        <?php if ($talk) : ?>
          <a class="btn btn-success" href="http://<?=$_SERVER['HTTP_HOST']?>/selling/main/show-selling?selling_token=<?=$model->selling_token?>">Ссылка для клиента</a>
        <?php endif ?>

    </div>

    <?= Html::input('hidden', 'id', $model->id, ['rows' => 5]) ?>

    <?= Html::endForm() ?>

    <script>
        var div = $("#chat");
        $('#history_form').on('submit', (e) => {
            ttt = div[0].scrollTop;
            e.preventDefault();
            $.pjax({type:'POST', url:'/selling/talk/comment-history', container:'#history_chat',data:$(e.target).serialize(),push: false,replace: false,timeout: 10000,"scrollTo" : $('#chat').offset()});
        });

        function updateList() {
            ttt = div[0].scrollTop;
            $.pjax({type:'POST', url:'/selling/talk/comment-history', container:'#history_chat',data:$('#history_form')[0][0].name+"="+$('#history_form')[0][0].value+"&id="+$('#history_form')[0][3].value+"&comment=",push: false,replace: false,timeout: 10000,"scrollTo" : $('#chat').offset()}).done(
                function(){

                }
            );
        }
        setInterval(updateList, 4000);

        div.scrollTop(div.prop('scrollHeight'));
        //console.log(div[0].scrollTop);
    </script>

</div>
