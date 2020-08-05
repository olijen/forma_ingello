<?php
$this->registerCssFile('@web/css/time-line-style.css');
$this->registerJsFile('@web/js/time-line.js');

use yii\helpers\Html;
?>

<div id="picture" style="padding: ">

    <div style="display: flex; justify-content: center;">
    <?= Html::a('Назад', 'index', ['class' => 'btn btn-success', ]) ?>
    <?= Html::a('Вперед', 'index', ['class' => 'btn btn-success', 'style' => 'margin-left: 15px;']) ?>
    </div>
    <?= Html::textarea('title','тут будет описание регламента',
    ['style'=>"margin: 5px; width: 1105px; height: 41px;",
    'readonly'=> true])
?>
</div>


<?php if (isset($regularities) && !empty($regularities)): ?>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <?php foreach ($regularities as $regularity): ?>

                <li class="<?= $regularity->id == $regularities[0]->id ? 'active' : '' ?> ">
                    <a href="#tab_<?= $regularity['id'] ?>" data-toggle="tab">
                        <?= $regularity['name'] ?>
                    </a>
                </li>
            <?php endforeach; ?>
            <a href="/core/regularity/settings">
                <i class="fa fa-cog"></i>
            </a>
        </ul>

        <div class="tab-content">
            <?php foreach ($regularities as $regularity): ?>

                <div class="tab-pane <?= $regularity['id'] == $regularities[0]->id ? 'active' : '' ?>"
                     id="tab_<?= $regularity['id'] ?>">
                    <?= $this->render('user-main-item', [
                        'regularity' => $regularity,
                        'items' => $items,
                        'subItems' => $subItems,
                    ]) ?>
                    <a href="/core/item/create?regularity_id=<?= $regularity['id'] ?>">
                        <i class="fa fa-plus"></i>
                        Добавить пункт
                    </a>
                    <!-- /.tab-pane -->
                </div>
            <?php endforeach; ?>
            <!-- /.tab-pane -->
        </div>

    </div>
<?php endif; ?>


<br><br><br><br><br><br><br><br><br>


<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                    <div class="cd-horizontal-timeline loaded">
                        <div class="timeline">
                            <div class="events-wrapper">
                                <div class="events" style="width: 1800px;">
                                    <ol>
                                        <li><a href="#0" data-date="16/01/2017" class="older-event"
                                               style="left: 120px;">16 Jan</a></li>
                                        <li><a href="#0" data-date="28/02/2017" style="left: 300px;"
                                               class="older-event">28 Feb</a></li>
                                        <li><a href="#0" data-date="20/04/2017" style="left: 480px;" class="selected">20
                                                Mar</a></li>
                                        <li><a href="#0" data-date="20/05/2017" style="left: 600px;">20 May</a></li>
                                        <li><a href="#0" data-date="09/07/2017" style="left: 780px;">09 Jul</a></li>
                                        <li><a href="#0" data-date="30/08/2017" style="left: 960px;">30 Aug</a></li>
                                        <li><a href="#0" data-date="15/09/2017" style="left: 1020px;">15 Sep</a></li>
                                        <li><a href="#0" data-date="01/11/2017" style="left: 1200px;">01 Nov</a></li>
                                        <li><a href="#0" data-date="10/12/2017" style="left: 1380px;">10 Dec</a></li>
                                        <li><a href="#0" data-date="19/01/2018" style="left: 1500px;">29 Jan</a></li>
                                        <li><a href="#0" data-date="03/03/2018" style="left: 1680px;">3 Mar</a></li>
                                    </ol>
                                    <span class="filling-line" aria-hidden="true"
                                          style="transform: scaleX(0.281506);"></span>
                                </div>
                                <!-- .events -->
                            </div>
                            <!-- .events-wrapper -->
                            <ul class="cd-timeline-navigation">
                                <li><a href="#0" class="prev inactive">Prev</a></li>
                                <li><a href="#0" class="next">Next</a></li>
                            </ul>
                            <!-- .cd-timeline-navigation -->
                        </div>
                        <!-- .timeline -->
                        <div class="events-content" style="height: 225px;">
                            <ol>
                                <li class="" data-date="16/01/2017">
                                    <h4>
                                        <img class="rounded float-left m-r-15" width="40" alt="user"
                                             src="https://bootdey.com/img/Content/avatar/avatar1.png"> Horizontal
                                        Timeline<br>
                                        <small>January 16th, 2017</small>
                                    </h4>
                                    <hr>
                                    <p>It is a long established fact that a reader will be distracted by the readable
                                        content of a page when looking at its layout. The point of using Lorem Ipsum is
                                        that it has a more-or-less normal distribution of letters, as opposed to using
                                        'Content here, content here', making it look like readable English. Many desktop
                                        publishing packages and web page editors infancy.
                                        <br>
                                        <button class="btn btn-primary btn-round">Read more</button>
                                    </p>
                                </li>
                                <li data-date="28/02/2017" class="">
                                    <h4>
                                        <img class="rounded float-left m-r-15" width="40" alt="user"
                                             src="https://bootdey.com/img/Content/avatar/avatar2.png"> Horizontal
                                        Timeline<br>
                                        <small>Feb 28th, 2017</small>
                                    </h4>
                                    <hr>
                                    <p>It is a long established fact that a reader will be distracted by the readable
                                        content of a page when looking at its layout. The point of using Lorem Ipsum is
                                        that it has a more-or-less normal distribution of letters, as opposed to using
                                        'Content here, content here', making it look like readable English. Many desktop
                                        publishing packages and web page editors infancy.
                                        <br>
                                        <button class="btn btn-primary btn-round">Read more</button>
                                    </p>
                                </li>
                                <li data-date="20/04/2017" class="selected">
                                    <h4>
                                        <img class="rounded float-left m-r-15" width="40" alt="user"
                                             src="https://bootdey.com/img/Content/avatar/avatar3.png"> Horizontal
                                        Timeline<br>
                                        <small>March 20th, 2017</small>
                                    </h4>
                                    <hr>
                                    <p>It is a long established fact that a reader will be distracted by the readable
                                        content of a page when looking at its layout. The point of using Lorem Ipsum is
                                        that it has a more-or-less normal distribution of letters, as opposed to using
                                        'Content here, content here', making it look like readable English. Many desktop
                                        publishing packages and web page editors infancy.
                                        <br>
                                        <button class="btn btn-primary btn-round">Read more</button>
                                    </p>
                                </li>
                                <li data-date="20/05/2017">
                                    <h4>
                                        <img class="rounded float-left m-r-15" width="40" alt="user"
                                             src="https://bootdey.com/img/Content/avatar/avatar4.png"> Horizontal
                                        Timeline<br>
                                        <small>May 20th, 2017</small>
                                    </h4>
                                    <hr>
                                    <p>It is a long established fact that a reader will be distracted by the readable
                                        content of a page when looking at its layout. The point of using Lorem Ipsum is
                                        that it has a more-or-less normal distribution of letters, as opposed to using
                                        'Content here, content here', making it look like readable English. Many desktop
                                        publishing packages and web page editors infancy.
                                        <br>
                                        <button class="btn btn-primary btn-round">Read more</button>
                                    </p>
                                </li>
                                <li data-date="09/07/2017">
                                    <h4>
                                        <img class="rounded float-left m-r-15" width="40" alt="user"
                                             src="https://bootdey.com/img/Content/avatar/avatar1.png"> Horizontal
                                        Timeline<br>
                                        <small>July 9th, 2017</small>
                                    </h4>
                                    <hr>
                                    <p>It is a long established fact that a reader will be distracted by the readable
                                        content of a page when looking at its layout. The point of using Lorem Ipsum is
                                        that it has a more-or-less normal distribution of letters, as opposed to using
                                        'Content here, content here', making it look like readable English. Many desktop
                                        publishing packages and web page editors infancy.
                                        <br>
                                        <button class="btn btn-primary btn-round">Read more</button>
                                    </p>
                                </li>
                                <li data-date="30/08/2017">
                                    <h4>
                                        <img class="rounded float-left m-r-15" width="40" alt="user"
                                             src="https://bootdey.com/img/Content/avatar/avatar2.png"> Horizontal
                                        Timeline<br>
                                        <small>August 30th, 2017</small>
                                    </h4>
                                    <hr>
                                    <p>It is a long established fact that a reader will be distracted by the readable
                                        content of a page when looking at its layout. The point of using Lorem Ipsum is
                                        that it has a more-or-less normal distribution of letters, as opposed to using
                                        'Content here, content here', making it look like readable English. Many desktop
                                        publishing packages and web page editors infancy.
                                        <br>
                                        <button class="btn btn-primary btn-round">Read more</button>
                                    </p>
                                </li>
                                <li data-date="15/09/2017">
                                    <h4>
                                        <img class="rounded float-left m-r-15" width="40" alt="user"
                                             src="https://bootdey.com/img/Content/avatar/avatar6.png"> Horizontal
                                        Timeline<br>
                                        <small>September 15th, 2017</small>
                                    </h4>
                                    <hr>
                                    <p>It is a long established fact that a reader will be distracted by the readable
                                        content of a page when looking at its layout. The point of using Lorem Ipsum is
                                        that it has a more-or-less normal distribution of letters, as opposed to using
                                        'Content here, content here', making it look like readable English. Many desktop
                                        publishing packages and web page editors infancy.
                                        <br>
                                        <button class="btn btn-primary btn-round">Read more</button>
                                    </p>
                                </li>
                                <li data-date="01/11/2017">
                                    <h4>
                                        <img class="rounded float-left m-r-15" width="40" alt="user"
                                             src="https://bootdey.com/img/Content/avatar/avatar7.png"> Horizontal
                                        Timeline<br>
                                        <small>November 01st, 2017</small>
                                    </h4>
                                    <hr>
                                    <p>It is a long established fact that a reader will be distracted by the readable
                                        content of a page when looking at its layout. The point of using Lorem Ipsum is
                                        that it has a more-or-less normal distribution of letters, as opposed to using
                                        'Content here, content here', making it look like readable English. Many desktop
                                        publishing packages and web page editors infancy.
                                        <br>
                                        <button class="btn btn-primary btn-round">Read more</button>
                                    </p>
                                </li>
                                <li data-date="10/12/2017">
                                    <h4>
                                        <img class="rounded float-left m-r-15" width="40" alt="user"
                                             src="https://bootdey.com/img/Content/avatar/avatar8.png"> Horizontal
                                        Timeline<br>
                                        <small>December 10th, 2017</small>
                                    </h4>
                                    <hr>
                                    <p>It is a long established fact that a reader will be distracted by the readable
                                        content of a page when looking at its layout. The point of using Lorem Ipsum is
                                        that it has a more-or-less normal distribution of letters, as opposed to using
                                        'Content here, content here', making it look like readable English. Many desktop
                                        publishing packages and web page editors infancy.
                                        <br>
                                        <button class="btn btn-primary btn-round">Read more</button>
                                    </p>
                                </li>
                                <li data-date="19/01/2018">
                                    <h4>Event title here</h4>
                                    <em>January 19th, 2018</em>
                                    <p>It is a long established fact that a reader will be distracted by the readable
                                        content of a page when looking at its layout. The point of using Lorem Ipsum is
                                        that it has a more-or-less normal distribution of letters, as opposed to using
                                        'Content here, content here', making it look like readable English. Many desktop
                                        publishing packages and web page editors infancy.</p>
                                </li>
                                <li data-date="03/03/2018">
                                    <h4>Event title here</h4>
                                    <em>March 3rd, 2018</em>
                                    <p>It is a long established fact that a reader will be distracted by the readable
                                        content of a page when looking at its layout. The point of using Lorem Ipsum is
                                        that it has a more-or-less normal distribution of letters, as opposed to using
                                        'Content here, content here', making it look like readable English. Many desktop
                                        publishing packages and web page editors infancy.</p>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>