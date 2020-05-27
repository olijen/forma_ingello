
    <?php
    \insolita\wgadminlte\LteChatBox::begin([
        'type' => \insolita\wgadminlte\LteConst::TYPE_PRIMARY,
        'footer'=>'<input type="text" name="newMessage"><input class="btn submit-message" value="Отправить">',
        'title'=>'Сообщения',
        'boxTools' => '
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                    class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                    <button class="btn btn-xs"><i class="fa fa-refresh"></i></button>'
    ]);
    echo \insolita\wgadminlte\LteChatMessage::widget([
        'isRight' => false,
        'author' => 'Атрур Кольдара',
        'message' => 'Я всё проверил 10 раз, всё идеально работает.',
        'image'=>'https://almsaeedstudio.com/themes/AdminLTE/dist/img/user3-128x128.jpg',
        'createdAt' => '5 минут назад'
    ]);
    echo  \insolita\wgadminlte\LteChatMessage::widget([
        'isRight' => true,
        'author' => 'Овик Болгаровский',
        'message' => '#421+40',
        'image'=>'https://almsaeedstudio.com/themes/AdminLTE/dist/img/user8-128x128.jpg',
        'createdAt' => '2017-23-03 17:33'
    ]);
    echo  \insolita\wgadminlte\LteChatMessage::widget([
        'isRight' => true,
        'author' => 'Ламба Дамытанцу',
        'message' => 'Ему "бара". Весь день я рядом, но еще тебя  не видел. На мне свитер.',
        'image'=>'https://almsaeedstudio.com/themes/AdminLTE/dist/img/user1-128x128.jpg',
        'createdAt' => '2017-23-03 17:33'
    ]);
    \insolita\wgadminlte\LteChatBox::end();
    ?>
