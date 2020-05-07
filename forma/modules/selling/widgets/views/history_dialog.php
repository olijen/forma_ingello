<?php

use yii\bootstrap\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;

?>
<div class="" id="dialog">

    <?= $form = Html::beginForm(['talk/comment-history'], 'post', ['data-pjax' => '1', 'class' => 'form-inline', 'id' => 'history_form']); ?>
    <?php Pjax::begin(['enablePushState' => false, 'id' => 'history_chat']) ?>

    <div id="chat" style="max-height: 150px; overflow-x: auto;">

        <?= $model->dialog ?? 'История сообщений пуста' ?>

    </div>

    <script>

        var div = $("#chat");
        div.scrollTop(div.prop('scrollHeight'));
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
        $('#history_form').on('submit', (e) => {
            console.log($(e.target).serialize());
            e.preventDefault();
            $.pjax({type:'POST', url:'/selling/talk/comment-history', container:'#history_chat',data:$(e.target).serialize(),push: false,replace: false,timeout: 10000,"scrollTo" : $('#chat').offset({ top: 100 })});
        })
    </script>

</div>
