<?php
$this->registerCssFile('@web/css/time-line-style.css');
$this->registerJsFile('@web/js/time-line.js');

use yii\helpers\Html;

$dataDateCount = '2010-09-02';
$dataDateCount = date('Y-m-d', strtotime($dataDateCount) + 86400);

?>
<script> let regularityTitle = []; </script>

<div id="picture" style="padding-top: 550px ">
    <p id="name_on_picture" style="display: flex; justify-content: center; color: #ff0000">wdafes</p>
    <div style="display: flex; justify-content: center; ">
        <?= Html::a('Назад', 'index', ['class' => 'btn btn-success',]) ?>
        <?= Html::a('Вперед', 'index', ['class' => 'btn btn-success', 'style' => 'margin-left: 15px;']) ?>
    </div>
    <?= Html::textarea('title', 'тут будет описание регламента',
        ['style' => "margin: 5px; width: 1105px; height: 41px;",
            'readonly' => true, 'id' => 'regularity_title'])
    ?>
</div>


<?php if (isset($regularities) && !empty($regularities)): ?>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <?php foreach ($regularities as $regularity) {

                echo $this->render('create-li', [
                    'id' => $regularity->id,
                    'activeId' => $regularities[0]->id,
                    'addHrefName' => 'regularity',
                    'navBarName' => $regularity->name,
                    'description' => $regularity->title,
                    'nameOnPicture' => 'Регламент: ' . $regularity->name,
                    'picture' => $regularity->picture,
                ]);
            } ?>
        </ul>

        <div class="tab-content">
            <?php foreach ($regularities as $regularity): ?>

                <div class="tab-pane <?= $regularity['id'] == $regularities[0]->id ? 'active' : '' ?>"
                     id="tab_regularity_<?= $regularity['id'] ?>">

                    <?php if ($regularity === $regularities[0]): ?>
                        <?php is_null($regularity->picture) ? $regularity->picture = '' : true ?>
                        <script>
                            //changeArea('<?//= $regularity->title ?>//', '<?//= $regularity->name ?>//', '<?//= $regularity->picture?>//');
                            regularity_title.value = '<?= $regularity->title ?>';
                            document.getElementById("name_on_picture").innerHTML = '<?= $regularity->name ?>';
                            document.getElementById("picture").style.backgroundImage = "url('<?= $regularity->picture?>')";
                        </script>
                    <?php endif; ?>

                    <?= $this->render('user-main-item', [
                        'regularity' => $regularity,
                        'items' => $items,
                        'subItems' => $subItems,
                    ]) ?>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>

<br><br><br><br><br><br><br><br><br>


<div class="cd-horizontal-timeline loaded">
    <div class="timeline">
        <div class="events-wrapper">
            <div class="events" style="width: 1800px;">
                <ol>
                    <li><a href="#0" data-date="16/01/2017" class="selected" style="left: 120px;">16 Jan</a></li>
                    <li><a href="#0" data-date="28/02/2017" style="left: 300px;">28 Feb</a></li>
                    <li><a href="#0" data-date="20/04/2017" style="left: 480px;">20 Mar</a></li>
                    <li><a href="#0" data-date="20/05/2017" style="left: 600px;">20 May</a></li>
                    <li><a href="#0" data-date="09/07/2017" style="left: 780px;">09 Jul</a></li>
                    <li><a href="#0" data-date="30/08/2017" style="left: 960px;">30 Aug</a></li>
                    <li><a href="#0" data-date="15/09/2017" style="left: 1020px;">15 Sep</a></li>
                    <li><a href="#0" data-date="01/11/2017" style="left: 1200px;">01 Nov</a></li>
                    <li><a href="#0" data-date="10/12/2017" style="left: 1380px;">10 Dec</a></li>
                    <li><a href="#0" data-date="19/01/2018" style="left: 1500px;">29 Jan</a></li>
                    <li><a href="#0" data-date="03/03/2018" class="older-event" style="left: 1680px;">3 Mar</a></li>
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
                <p>It is a long established fact that a reader will be distracted by the readable
                    content of a page when looking at its layout. The point of using Lorem Ipsum is
                    that it has a more-or-less normal distribution of letters, as opposed to using
                    'Content here, content here', making it look like readable English. Many desktop
                    publishing packages and web page editors infancy.
                </p>
            </li>
        </ol>
    </div>
</div>