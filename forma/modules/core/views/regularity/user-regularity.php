<?php
//$this->registerCssFile('@web/css/time-line-style.css', ['position' => \yii\web\View::POS_BEGIN]);
$this->registerJsFile('@web/js/time-line.js', ['position' => \yii\web\View::POS_BEGIN]);

use forma\modules\core\components\LinkHelper;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\web\JsExpression;

$this->params['doc-page'] = 'regularity';
$this->title = 'Публичный регламент';

$borderMarginRight = isset($_GET['without-header']) ? '100' : '50';

$this->registerCss('
label {
    display: block;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
    margin-bottom: 0px;
}


.check-radio {
    margin: 4px auto;
    display: inline-block;
    margin-top: 3px;
    margin-bottom: 0px;
}

.cont-carousel {
    position: relative;
    width: 800px;
    height: 45px;
    padding: 10px 40px;
    border: 10px;
    border-radius: 15px;
}

.carousel {
    border-radius: 7px;
    width: 80%;
    height: 50px;
    overflow: hidden;
    overflow-x: scroll;
    white-space: nowrap;
}

input[type=checkbox], input[type=radio] {
    box-sizing: border-box;
    padding: 0;
}

.carousel::-webkit-scrollbar {
    width: 7px;
    height: 4px;
    background-color: #ffffff;
}

.carousel::-webkit-scrollbar-thumb {
    border-width: 3px 3px 3px 2px;
    border-color: #00b65d;
    background-color: #3c8dbc;
}

#text-div::-webkit-scrollbar {
    width: 7px;
    height: 4px;
    background-color: #ffffff;
}

#text-div::-webkit-scrollbar-thumb {
    border-width: 3px 3px 3px 2px;
    border-color: #00b65d;
    background-color: #3c8dbc;
}

.carousel-child {
    display: inline-block;
    vertical-align: top;
    width: 25%;
    height: 60px;

}

#text-div {
    background: #ffffff; /* Цвет фона */
    color: #000000; /* Цвет текста */
    overflow-y: scroll;
    height: 125px;
}

#name_on_picture {
    position: absolute;
    top: 30px;
    left: 0;
    width: 100%;
    display: flex;
    justify-content: center;
    color: #ffffff;
}

.h-text {
    text-shadow: 4px 3px 9px black;
    position: absolute;
    left: 0;
    width: 100%;
    display: flex;
    justify-content: center;
    color: #ffffff;
}

h2.h-text  {
    font-size: 30px;
    top: 0px;
}

h3.h-text {
    font-size: 23px;
    top: 33px;
}

h4.h-text {
    font-size: 20px;
    top: 69px;
}

.content {
    padding: 0px;
    padding-right: 0px;
    padding-left: 0px;
}

.container-fluid {
    padding-right: 0px;
    padding-left: 0px;
    margin-right: auto;
    margin-left: auto;
}

#border {
    margin-left: 50px;
    margin-right: ' . $borderMarginRight . 'px;
}

.content-header {
    position: relative;
    padding: 0px 0px 0 0px;
}

p {
    margin: 0 0 3px;
}


.container-label {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

.container-label input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 16px;
    width: 16px;
    background-color: #eee;
    border-radius: 50%;
}   

/* On mouse-over, add a grey background color */
.container-label:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container-label input:checked ~ .checkmark {
    background-color: #3c8dbc;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the indicator (dot/circle) when checked */
.container-label input:checked ~ .checkmark:after {
    display: block;
}


.container-label .checkmark:after {
    top: 27%;
    left: 27%;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: white;
}

.skin-green-light .wrapper {
    background-color: white;
}

#picture {
    background-repeat: no-repeat;
    background-size: 100% 100%;
    position: relative;

}

#nav-tabs{
    margin-bottom: 0px;
}


.navigator{
    padding: 10px;
    padding-left: 20px;
    padding-right: 20px;
    margin: 10px;
}

@media screen and (max-width: 768px) {
        .desc {
            display: none;
        }
        
        #nav-tabs{
            visibility: hidden;
        }
        
        #border {
            margin-left: 5px;
            margin-right: 5px;
        } 
    }
');
?>

<div id="border">
    <?php if (isset($regularities) && !empty($regularities)): ?>
        <div id="picture" style="padding-top: 400px ">
            <div id="name_on_picture" style="">
            </div>
            <div class="navigator-pane" style="display: flex; justify-content: center; ">
                <button class='btn btn-light navigator prev' onclick="event.stopPropagation()"
                        style="margin-bottom: 20px;">
                    Назад
                </button>
                <button class='btn btn-light navigator next' onclick="event.stopPropagation()"
                        style="background-color: #3c8dbc; color: #fff;     margin-bottom: 20px;">
                    Вперед
                </button>
            </div>
            <div id="text-div">

            </div>
        </div>

        <div id="nav-tabs" class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <?php foreach ($regularities as $regularity): ?>
                    <li class=" <?php if ($regularity->id == $regularities[0]->id) echo 'active'; ?> "
                        data-href="tab_regularity_<?= $regularity['id'] ?>">
                        <a href="#tab_regularity_<?= $regularity['id'] ?>"
                           class="change-regularity"
                           data-toggle="tab"
                           data-href="tab_regularity_<?= $regularity['id'] ?>"
                           data-name="<?= '<h2>' . $regularity->name . '</h2>' ?>"
                           data-picture="<?= is_null($regularity->picture) ? 'false' : $regularity->picture ?>"
                           aria-expanded="<?= $regularity->id == $regularities[0]->id ? 'true' : '' ?>">
                            <?= $regularity['name'] ?>
                            <input type="hidden" class="hidden-description" value="<?= $regularity->title ?>">
                            <div class="hidden-description" style="visibility: hidden; display: none;">
                                <?= $regularity->title ?></div>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <div class="tab-content" style="padding: 0px">
                <?php foreach ($regularities as $regularity): ?>

                    <div class="tab-pane <?= $regularity->id == $regularities[0]->id ? 'active' : '' ?>"
                         id="tab_regularity_<?= $regularity['id'] ?>">

                        <?php if ($regularity === $regularities[0]): ?>
                            <script>
                                changeArea('<?= $regularity->title ?>',
                                    '<?=  '<h2>' . $regularity->name . '</h2>' ?>',
                                    '<?= is_null($regularity->picture) ? '/images/bot.jpg' : $regularity->picture ?>');
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
    <?php else: ?>
        <?php if (!Yii::$app->user->isGuest){
            echo '<br><br><br>';
        }
        echo 'Регламентов или юзера не существует' ?>
    <?php endif; ?>
</div>
