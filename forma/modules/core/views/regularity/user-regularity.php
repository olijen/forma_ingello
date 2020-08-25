<?php
$this->registerCssFile('@web/css/time-line-style.css');
$this->registerJsFile('@web/js/time-line.js');

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\web\JsExpression;


?>

<?php


$this->registerCss('
.line {
     position: absolute;
    z-index: 1;
    left: 0;
    top: 50px;
    height: 2px;
    /* width will be set using JavaScript */
    background: #dfdfdf;
    -webkit-transition: -webkit-transform 0.4s;
    -moz-transition: -moz-transform 0.4s;
    transition: transform 0.4s;
}

.filling-line {
    /* this is used to create the green line filling the timeline */
    position: absolute;
    z-index: 1;
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    background-color: #313740;
    -webkit-transform: scaleX(0);
    -moz-transform: scaleX(0);
    -ms-transform: scaleX(0);
    -o-transform: scaleX(0);
    transform: scaleX(0);
    -webkit-transform-origin: left center;
    -moz-transform-origin: left center;
    -ms-transform-origin: left center;
    -o-transform-origin: left center;
    transform-origin: left center;
    -webkit-transition: -webkit-transform 0.3s;
    -moz-transition: -moz-transform 0.3s;
    transition: transform 0.3s;
}
----------------------------------------------------------

fieldset {
      overflow: hidden
    }
    
    .some-class {
      float: left;
      clear: none;
    }
    
    label {
      float: left;
      clear: none;
      display: block;
      padding: 0px 1em 0px 8px;
    }
    
    input[type=radio],
    input.radio {
      float: left;
      clear: none;
      margin: 2px 0 0 2px;
    }
    
    .carousel-test {
  position: relative;
  width: 398px;
  padding: 10px 40px;
  border: 1px solid #CCC;
  border-radius: 15px;
  background: #eee;
}
');
?>


    <div id="picture" style="padding-top: 550px ">
        <p id="name_on_picture" style="display: flex; justify-content: center; color: #ff0000">wdafes</p>
        <div class="navigator" style="display: flex; justify-content: center; ">
            <button class='btn btn-success navigator prev' onclick="event.stopPropagation()" >Назад</button>
            <button class='btn btn-success navigator next' onclick="event.stopPropagation()" style=" margin-left: 15px;">Вперед</button>
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

                <li class=" <?php if($regularity->id == $regularities[0]->id) { echo 'active' ;} ?> "  data-href = "tab_regularity_<?= $regularity['id'] ?>">
                    <a href="#tab_regularity_<?= $regularity['id'] ?>" data-toggle="tab" name="tab_regularity_<?= $regularity['id'] ?>"
                       onclick="changeArea('<?= $regularity->title ?>', '<?= 'Регламент: ' . $regularity->name ?>', '<?= $regularity->picture ?>')"
                       aria-expanded="<?= $regularity->id == $regularities[0]->id ? 'true' : '' ?>"
                    >
                        <?= $regularity['name'] ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

        <div class="tab-content">
            <?php foreach ($regularities as $regularity): ?>

                <div class="tab-pane <?= $regularity->id == $regularities[0]->id ? 'active' : '' ?>"
                     id="tab_regularity_<?= $regularity['id'] ?>">

                    <?php if ($regularity === $regularities[0]): ?>
                        <?php is_null($regularity->picture) ? $regularity->picture = '' : true ?>
                        <script>
                            //changeArea('<?//= $regularity->title ?>//', '<?//= $regularity->name ?>//', '<?//= $regularity->picture?>//');
                            regularity_title.value = '<?= $regularity->title ?>';//меняю значение по id (textarea)
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