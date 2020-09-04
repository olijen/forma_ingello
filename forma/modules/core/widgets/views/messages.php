
    <?php
    \insolita\wgadminlte\LteChatBox::begin([
        'type' => \insolita\wgadminlte\LteConst::TYPE_PRIMARY,
        'footer'=>'<input type="text" name="newMessage"><input class="btn submit-message" value="Отправить">',
        'title'=>'<i class="fas fa-envelope"></i> Сообщения',
        'boxTools' => '
                  <div class="btn-group">
                    <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bars"></i></button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li><a href="/customer/customer"><i class="fa fa-user-circle"></i>Клиенты</a></li>
                        <li><a href="/vacancy/vacancy"><i class="fa fa-id-card"></i>Вакансии</a></li>
                    </ul>
                </div>
                <button type="button" class="btn btn-warning btn-sm"  data-widget="collapse"><i
                        class="fa fa-minus"></i>
                  
                    <button class="btn btn-xs"><i class="fa fa-refresh"></i></button>',
        'topTemplate' =>  '
            <div class="direct-chat direct-chat-primary box box-primary  " data-widget_name="Messages">
            <div class="box-header big_widget_header"><h3 class="box-title"><i class="fas fa-envelope"></i> Сообщения</h3>{box-tools}</div>
            <div class="box-body">
            <div class="direct-chat-messages">
',
        'bottomTemplate' => '
</div>
</div>
<div class="box-footer {footerOptions}">{footer}</div>
<div class="small_widget_header box-header" style="display:none"><h3 style="margin-top: 0" class="box-title" data-toggle="tooltip" data-placement="top" title="Сообщения" ><i class="fas fa-envelope"></i> </h3></div>
</div>
'
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
