<?php
$this->registerCssFile('@web/css/time-line-style.css');
$this->registerJsFile('@web/js/time-line.js');

use yii\helpers\Html;


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
            <?php foreach ($regularities as $regularity): ?>

                <li class="<?= $regularity->id == $regularities[0]->id ? 'active' : '' ?> ">
                    <a href="#tab_regularity_<?= $regularity['id'] ?>" data-toggle="tab"
                       onclick="changeArea('<?= $regularity->title ?>', '<?= 'Регламент: ' . $regularity->name ?>', '<?= $regularity->picture ?>')"
                    >

                        <?= $regularity['name'] ?>
                    </a>
                </li>
            <?php endforeach; ?>


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
                            document.getElementById("name_on_picture").innerHTML = '<?= 'Регламент: ' . $regularity->name ?>';
                            //document.getElementById("picture").style.backgroundImage = "url('<?//= $regularity->picture?>//')";
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
