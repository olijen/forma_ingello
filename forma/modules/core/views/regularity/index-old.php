<?php

$this->title = 'Регламент, правила';

function show($url, $text = "Открыть", $with = 600, $height = 600, $left = 600)
{
    if ($url{0} == '/') {
      if (false === strripos($url, '?')) {
        $url .= '?';
      } else {
          $url .= '&';
      }
      $url .= 'without-header';
    }
    //if ($url{0} == '/') {
        echo \forma\components\widgets\ModalSrc::widget([
            'route' => $url,
            'name' => $text,
            'icon' => 'eye',
            'color' => 'blue',
            'iframe' => true,
            'options' => [
                'class' => 'btn btn-primary btn-xs',
                'style' => ['border' => '1px solid green'],
                'id' => 'id'.time(),
            ]
        ]);
        return;
    //}
    ?>
      <a
          onclick="window.open('<?= $url ?>', 'Window', 'width=600,height=600,left=600')"
          class="btn btn-primary btn-xs ">
          <?= $text ?>
      </a>
    <?php
}

?>

<section class="content">

  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">

      <li class="active"><a href="#tab_1" data-toggle="tab">Инструкции</a></li>
      <li><a href="#tab_2" data-toggle="tab">Презентация</a></li>
      <li><a href="#tab_3" data-toggle="tab">Собеседование</a></li>
      <li><a href="#tab_4" data-toggle="tab">Обслуживание</a></li>

    </ul>

    <div class="tab-content">
      <div class="tab-pane active" id="tab_1">


        <div class="row">
          <div class="col-md-12">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h4 class="box-title"><i class="fa fa-phone"></i> Этот раздел поможет интегрировать систему FORMA с
                  любой компанией</h4>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="box-group" id="accordion">

                  <div class="panel box box-success">
                    <div class="box-header with-border">
                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" class="collapsed"
                           aria-expanded="false">
                          Зачем нужен раздел регламент
                        </a>
                      </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                      <div class="box-body">
                        <strong>Регламент</strong> - это персональный электронный помощник, который помогает Вам и Вашим коллегам наладить рабочий процесс. Мы готовы настроить его под Вашу компанию.
                        <hr>
                        Регламент - это не просто текст. Он также помогает интегрировать некоторые бизнес
                        правила или события с конкретными функциями системы.
                        К примеру, при клике по <?php show("/selling/form/index", "этой кнопке") ?> запустится панель
                        добавления нового клиента.
                        А по по <?php show("http://dent.ingello.com", "этой") ?> - откроется отдельный проект - мед
                        разработка "DENT . INGELLO".
                      </div>
                    </div>
                  </div>

                  <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                  <div class="panel box box-primary">
                    <div class="box-header with-border">
                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false"
                           class="collapsed">
                          Зачем нужен раздел продаж
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse" aria-expanded="true">
                      <div class="box-body">
                        Раздел продаж поможет отделу вести мониторинг процессов продаж в <?php show("/selling", "воронке") ?>.
                        Для более детального поиска взаимодействий с клиентом можно воспользоваться <?php show("/selling/main", "таблицей") ?>.
                        Создайте новую <?php show("/selling/form/index", "продажу") ?>: выберете офис (или склад), добавьте клиента, укажите состояние.
                        Вы так же можете добавить продукты или услуги к продаже, но предварительно нужно добавить их через специальную <?php show("/product/product/create", "форму") ?>.

                      </div>
                    </div>
                  </div>

                  <div class="panel box box-danger">
                    <div class="box-header with-border">
                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed"
                           aria-expanded="false">
                          Какой то сложный вопрос
                        </a>
                      </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                      <div class="box-body">
                        Можно делать развёрнутые ответы, можно добавлять ссылки и
                        всплывающие окна. А самое главное, каждый может создать именно такой регламент, как ему хочется!


                        <!-- /.box-header -->
                        <div class="box-body">
                          <div class="box-group" id="accordion1">
                            <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                            <div class="panel box box-primary">
                              <div class="box-header with-border">
                                <h4 class="box-title">
                                  <a data-toggle="collapse" data-parent="#accordion1" href="#capseOne"
                                     aria-expanded="false" class="collapsed">
                                    Еще один вопрос...
                                  </a>
                                </h4>
                              </div>
                              <div id="capseOne" class="panel-collapse collapse" aria-expanded="true">
                                <div class="box-body">
                                  Можно делать развёрнутые ответы, можно добавлять ссылки и всплывающие окна.

                                  <a onclick="window.open('/', 'Window', 'width=600,height=600,left=600')"
                                     class="btn btn-primary btn-xs ">Мониторинг</a>

                                </div>
                              </div>
                            </div>
                            <div class="panel box box-danger">
                              <div class="box-header with-border">
                                <h4 class="box-title">
                                  <a data-toggle="collapse" data-parent="#accordion1" href="#capseTwo" class="collapsed"
                                     aria-expanded="false">
                                    И еще вопрос
                                  </a>
                                </h4>
                              </div>
                              <div id="capseTwo" class="panel-collapse collapse" aria-expanded="false"
                                   style="height: 0px;">
                                <div class="box-body">
                                  Ответ на вопрос!
                                </div>
                              </div>
                            </div>
                            <div class="panel box box-success">
                              <div class="box-header with-border">
                                <h4 class="box-title">
                                  <a data-toggle="collapse" data-parent="#accordion1" href="#capseThree"
                                     class="collapsed" aria-expanded="false">
                                    И на этот вопрос есть ответ
                                  </a>
                                </h4>
                              </div>
                              <div id="capseThree" class="panel-collapse collapse" aria-expanded="false"
                                   style="height: 0px;">
                                <div class="box-body">
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson
                                  ad squid. 3
                                  wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                  nesciunt laborum
                                </div>
                              </div>
                            </div>
                            <div class="panel box box-success">
                              <div class="box-header with-border">
                                <h4 class="box-title">
                                  <a data-toggle="collapse" data-parent="#accordion1" href="#capseFour"
                                     class="collapsed" aria-expanded="false">
                                    Как дела?
                                  </a>
                                </h4>
                              </div>
                              <div id="capseFour" class="panel-collapse collapse" aria-expanded="false"
                                   style="height: 0px;">
                                <div class="box-body">
                                  Минутку, проверяю!

                                  <a onclick="window.open('/', 'Window', 'width=600,height=600,left=600')"
                                     class="btn btn-primary btn-xs ">Смотреть дешборд</a>

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>


                      </div>
                    </div>
                  </div>

                  <div class="panel box box-success">
                    <div class="box-header with-border">
                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree1" class="collapsed"
                           aria-expanded="false">
                          Нужна комплексная разработка
                        </a>
                      </h4>
                    </div>
                    <div id="collapseThree1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                      <div class="box-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                        3
                        wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                        laborum
                      </div>
                    </div>
                  </div>

                  <div class="panel box box-default">
                    <div class="box-header with-border">
                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree2" class="collapsed"
                           aria-expanded="false">
                          И еще один вопрос
                        </a>
                      </h4>
                    </div>
                    <div id="collapseThree2" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                      <div class="box-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                        3
                        wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                        laborum
                      </div>
                    </div>
                  </div>

                  <div class="panel box box-default">
                    <div class="box-header with-border">
                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree3" class="collapsed"
                           aria-expanded="false">
                          Соедините с руководителем
                        </a>
                      </h4>
                    </div>
                    <div id="collapseThree3" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                      <div class="box-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                        3
                        wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                        laborum
                      </div>
                    </div>
                  </div>

                  <div class="panel box box-default">
                    <div class="box-header with-border">
                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree4" class="collapsed"
                           aria-expanded="false">
                          Это из налоговой
                        </a>
                      </h4>
                    </div>
                    <div id="collapseThree4" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                      <div class="box-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                        3
                        wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                        laborum
                      </div>
                    </div>
                  </div>

                  <div class="panel box box-default">
                    <div class="box-header with-border">
                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree5" class="collapsed"
                           aria-expanded="false">
                          Работник пришел
                        </a>
                      </h4>
                    </div>
                    <div id="collapseThree5" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                      <div class="box-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                        3
                        wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                        laborum
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <div class="col-md-6">

          </div>
        </div>


      </div>
      <!-- /.tab-pane -->
      <div class="tab-pane" id="tab_2">
        Всё что нужно знать о системе:
        Открыть раздел регламентов.
        Регламент продажи продукта.
        Я буду просто его читать.
        <hr>
        <b>Говорить:</b>
        Приветствую Вас. Я не знаю, как Вас зовут, но я рад с Вами познакомиться. Пока что буду называть Вас "Зритель".
        Скажу честно, прямо сейчас я делаю то, что говорит мне программа. Система под названием FORMA ingello.
        Я всего лишь человек, просто смотрю на телефон и выполняю инструкции.
        <hr>
        Видео будет полезным, если Вы или Ваши коллеги работаете с компьютером и интернетом, с продуктами и услугами.
        FORMA разработана программистами Ingello и помогает компнаиям в ежедневной работе.
        Компания Ingello так же использует программу FORMA. Это логично, ведь Ingello - это всё.
        <hr>
        Прямо сейчас я читаю текст из специального раздела "Регламент".
        Это самый простой, но очень важный раздел системы.
        Давайте посмотрим на него.
        <hr>
        <b>!! Зайти в раздел в мобильном формате</b>


        Итак, у нас есть раздел, который помогает планировать различные процессы компании и связывать их с ФОРМОЙ.
        В этом разделе есть разные регламенты. Например сейчас я читаю регламент "Продажи", который помогает продавать наш продукт ФОРМУ.
        <hr>
        Позвольте, я запишу факт нашего знакомства в систему. Посмею сразу предположить, что Вам интересно, т.к. Вы еещ не выключили видео. Потому давайте перейдем к делу. Обычно мы говорим о разных продуктах и услугах компании. Но сегодня хотелось бы поговорить об услуге разработки больших корпоративных систем на основе платформы FORMA ingello.
        <hr>
        Выберем её в списке наших продуктов.
        <hr>
        Предположим, Ваc действительно интересует нешаблонное ПО, разработанное индивидуально под компанию.
        Но Вам хочется практических деталей и подробностей.
        <hr>
        Тогда перейдем на следующий этап - демонстрация.
        <hr>
        Каждый этап описан заранее, по этому для меня не составит труда это сделать.
        <hr>
        <b>!!Ссылка на дешборд</b>

          Воронка и другое
          Продажи
          -База контактов
          -Посмотреть историю
          Продукты
          Найм

          Следующий этап - демонстрация системы.
      </div>
      <!-- /.tab-pane -->
      <div class="tab-pane" id="tab_3">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
        Lorem Ipsum has been the <a href="#" class="btn btn-primary btn-xs">link</a>
        <hr>
        ndustry's standard dummy text ever since the 1500s,
        when an unknown printer took a galley of type and scrambled it to make a type specimen book.
        It has survived not only five centuries, but also the leap into electronic typesetting,
        remaining essentiall <a href="#" class="btn btn-primary btn-xs">link</a>
        y unchanged. It was popularised in the 1960s with the release of Letraset
        sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
        like Aldus PageMake <a href="#" class="btn btn-primary btn-xs">link</a>
        r including versions of Lorem Ipsum.
        <hr>
        The European languages are members of the same family. Their separate existence is a myth.
        For science, music, sp <a href="#" class="btn btn-primary btn-xs">link</a>
        <hr>
        ort, etc, Europe uses the same vocabulary. The languages only differ
        in their grammar, their pronunciation and their most common words. Everyone realizes why a
        new common language would be desirab
        <a href="#" class="btn btn-primary btn-xs">link</a>
        le: one could refuse
        to pay expensive translators. To
        achieve this, it would be necessary to have uniform grammar, pronunciation and more common
        words. If several languages coalesce, the grammar of the resulting language is more simple
        and regular than that of the individual languages.
        <hr>
        The European languages are members of the same family. Their separate existence is a myth.
        For science, music, <a href="#" class="btn btn-primary btn-xs">link</a>
        <hr>
        sport, etc, Europe uses the same vocabulary. The languages only differ
        in their grammar, their pronunciation and their most common words. Everyone realizes why a
        new common language would be desirable: one could refuse to pay expensive translators. To
        achieve this, it would be necessar <a href="#" class="btn btn-primary btn-xs">link</a>

        <hr>
        y to have uniform grammar, pronunciation and more common
        words. If several languages coalesce, the grammar of the resulting language is more simple
        and regular than that of the individual languages. <a href="#" class="btn btn-primary btn-xs">link</a>
      </div>
      <div class="tab-pane" id="tab_4">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
        Lorem Ipsum has been the industr
        <hr>
        y's standard dummy text ever since the 1500s,
        when an unknown printer took a galley of type and scrambled it to make a type specimen book.
        It has surviv
        <hr>
        ed not only five centuries, but also the leap into electronic typesetting,
        remaining essentially <a href="#" class="btn btn-primary btn-xs">link</a>
        unchanged. It was popularised in the 1960s with the release of Letraset
        sheets cont
        <hr>
        aining Lorem Ipsum p
        assages, and more recently with desktop publishing software
        like Aldus PageMaker including versions of Lorem Ipsum.
        The European lang <a href="#" class="btn btn-primary btn-xs">link</a>
        <hr>
        uage
        s are members of the same family. Their separate existence is a myth.
        For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
        in their grammar, their pronunciation and their most common words. Everyone realizes why a
        new common language <a href="#" class="btn btn-primary btn-xs">link</a>
        would be desirable: one could refuse to pay expensive translators. To
        achieve this, it

        <hr>
        would be necessary to have uniform grammar, pronunciation and more common
        words. If several languages coalesce, the grammar of the resulting language is more simple
        and regular than that of the individual languages.
        The European languag <a href="#" class="btn btn-primary btn-xs">link</a>

        <hr>
        es are members of the same family. Their separate existence is a myth.
        For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
        in their grammar, their <a href="#" class="btn btn-primary btn-xs">link</a>
        <hr>
        pronunciation and their most common words. Everyone realizes why a
        new common language would be desirable: one could refuse to pay expensive translators. To
        achieve this, it would b <a href="#" class="btn btn-primary btn-xs">link</a>
        <hr>
        e necessary to have uniform grammar, pronunciation and more common
        words. If several languages coalesce, the grammar of the resulting language is more simple
        and regular than that of the individual languages. <a href="#" class="btn btn-primary btn-xs">link</a>
      </div>
      <!-- /.tab-pane -->
    </div>
    <!-- /.tab-content -->
  </div>
</section>
