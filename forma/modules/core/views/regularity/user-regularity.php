<?php
$this->registerCssFile('@web/css/time-line-style.css');
$this->registerJsFile('@web/js/time-line.js', ['position' => \yii\web\View::POS_BEGIN]);

use forma\modules\core\components\LinkHelper;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\web\JsExpression;

$this->registerCss('

    label {
        display: block;
        margin-left: auto;
        margin-right: auto ;
        text-align: center;
    }
   
    
    .check-radio{
        margin: 4px auto;
        top: 40px;
        display: inline-block;
    }
    
    .cont-carousel{
        position: relative;
        width: 800px;
         height:60px;
        padding: 10px 40px;
        border: 10px;
        border-radius: 15px;
    }
    
.carousel {
    border-radius: 7px;
    width: 800px;
    height:60px;
    overflow: hidden;
    overflow-x: scroll;
    white-space:nowrap;
}

.carousel-child {
    display: inline-block;
    vertical-align: top;
    width: 200px;
    height:60px;

}

#text-div{
    background: #ffffff; /* Цвет фона */
    padding: 5px; /* Поля вокруг текста */
    color: #000000; /* Цвет текста */
    overflow-y: scroll;
    height: 70px;
    border: 1px solid #cccccc
}

#name_on_picture {
	position: absolute;
	top: 30px;
	left: 0;
	width: 100%;
	display: flex; 
	justify-content: center; 
	color: #ff0000;
	}
	
.content{
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



.content-header {
    position: relative;
    padding: 0px 0px 0 0px;
}
');
?>

<?php if (isset($regularities) && !empty($regularities)): ?>
    <div id="picture" style="padding-top: 420px ">
        <h1 id="name_on_picture" style=""></h1>
        <div class="navigator" style="display: flex; justify-content: center; ">
            <button class='btn btn-success navigator prev' onclick="event.stopPropagation()"
                    style="margin-bottom: 7px;">Назад
            </button>
            <button class='btn btn-success navigator next' onclick="event.stopPropagation()"
                    style=" margin-left: 15px; margin-bottom: 7px;">Вперед
            </button>
        </div>
        <div id="text-div">

        </div>
    </div>

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <?php foreach ($regularities as $regularity): ?>
                <li class=" <?php if ($regularity->id == $regularities[0]->id) {
                    echo 'active';
                } ?> "
                    data-href="tab_regularity_<?= $regularity['id'] ?>">
                    <a href="#tab_regularity_<?= $regularity['id'] ?>"
                       class="change-regularity"
                       data-toggle="tab"
                       data-href="tab_regularity_<?= $regularity['id'] ?>"
                       data-description="<?= $regularity->title ?> "
                       data-name="<?= $regularity->name ?>"
                       data-picture="<?= is_null($regularity->picture) ? 'false' : $regularity->picture ?>"
                       aria-expanded="<?= $regularity->id == $regularities[0]->id ? 'true' : '' ?>">
                        <?= $regularity['name'] ?>
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
                            // $(document).ready(function () {
                            changeArea('<?= $regularity->title ?>',
                                '<?= $regularity->name ?>',
                                '<?= is_null($regularity->picture) ? '/images/bot.jpg' : $regularity->picture ?>');
                            // });
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
    <?= 'Регламентов или юзера не существует' ?>
<?php endif; ?>