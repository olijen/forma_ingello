<script>
    <?=$this->renderFile('@app/web/js/time-line.js');?>
</script>


<?php

//$this->registerCssFile('@web/css/time-line-style.css', ['position' => \yii\web\View::POS_BEGIN]);

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
    width: 100%;
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
    margin: 5px;
    /*width: 25%;*/
    height: 100%;

}

#nav-tabs {
    height: 18%;
}

.tab-content {
    height: 18%;
}

#text-div {
    background: #ffffff; /* Цвет фона */
    color: #000000; /* Цвет текста */
    overflow: scroll;
    height: 60%;
}

#name_on_picture h2 {
    background: #cccccc78;
}
#name_on_picture {
    position: absolute;
    top: 10px;
    left: 0;
    width: 100%;
    display: flex;
    justify-content: center;
    color: #ffffff;
}

.h-text {
    text-shadow: 3px 4px 8px black;
    position: absolute;
    left: 0;
    width: 100%;
    display: flex;
    justify-content: center;
    color: #ffffff;
}

h2.h-text  {
    font-size: 70px;
    top: 0px;
}

h3.h-text {
    font-size: 35px;
    top: 80px;
}

#name_on_picture  h3 {
    font-size: 35px;
    top: 80px;
    text-shadow: 3px 4px 8px black;
    position: absolute;
    left: 0;
    width: 100%;
    display: flex;
    justify-content: center;
    color: #ffffff;
}

#name_on_picture h2 {
    font-size: 70px;
    top: 0px;
    text-shadow: 3px 4px 8px black;
    position: absolute;
    left: 0;
    width: 100%;
    display: flex;
    justify-content: center;
    color: #ffffff;
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
    margin: 0 auto;
    max-width: 2500px;
    
    
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
    padding-left: 25px;
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
    left: -8px;
    height: 21px;
    width: 21px;
    background-color: #eee;
    border: 1px solid #3c8dbc;
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
    height: 70vh;
}

#nav-tabs{
    margin-bottom: 0px;
    min-height: 30vh;
    
}

.navigator-pane button {
    font-size: 30px;
    margin: 10px;
    margin-bottom: 20px;
    padding: 10px;
    padding-left: 20px;
    padding-right: 20px;
    color: white;
}

#usualReglament {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
}

#public_for_newUser {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
}


.container.fluid {
width: 100%;

}

.btn:hover, .btn:focus, .btn:focus {
    color: #fff;
}

 .modal-body .sidebar-mini.sidebar-collapse .content-wrapper,
 .sidebar-mini.sidebar-collapse .right-side,
  .sidebar-mini.sidebar-collapse .main-footer {
    margin-left: 0 !important;
  
  }
@media screen and (min-width: 768px) {
.modal-body .sidebar-mini.sidebar-collapse .content-wrapper,
 .sidebar-mini.sidebar-collapse .right-side,
  .sidebar-mini.sidebar-collapse .main-footer {
    margin-left: 0 !important;
  
  }
}
@media screen and (max-width: 767px) {
        .desc {
            display: none;
        }
        
        #name_on_picture  h3 {
            font-size: 30px;
        }
        
        #name_on_picture h2 {
            font-size: 50px;
        }
        
        #picture {
            height: 60vh
        }
        
        #nav-tabs {
            height: 38%
        }
        
        .navigator-pane button {
            font-size: 24px;
        }
}

@media screen and (max-width: 639px) {
        .navigator-pane button {
            font-size: 21px;
        }
}

#text-div {
    font-size: 20px;
}
@media screen and (max-width: 576px) {

        #text-div {
            font-size: 15px;
        }


        #name_on_picture  h3 {
            font-size: 25px;
            margin-top: 0;
        }
        
        #name_on_picture h2 {
            font-size: 40px;
            
        }
        
        .navigator-pane button {
            font-size: 24px;
        }
        
        .navigator-pane {
            flex-wrap: wrap;
        }
        
        #prev_step {
            order: 2;
            width: 43%;
        }
        
        #main_panel {
            order: 1;
            width: 90%;
        }
        
        #next_step {
            order: 3;
            width: 43%;
        }
}

#nav-tabs li.active {
    border-top: 10px solid orange;
}

@media screen and (max-width: 479px) {

        #picture {
            height: 60vh
        }
        
        #nav-tabs {
            height: 38%
        }

        #name_on_picture  h3 {
            font-size: 20px;
            margin-top: 0px;
        }
        
        #name_on_picture h2 {
            font-size: 30px;
            
        }
        
      
}

@media screen and (max-width: 359px) { 
  .navigator-pane button {
            font-size: 22px;
        }
}
    
.tab-pane .container, .carousel {
    padding: 0 !important;
    width: 100%;
    padding-left: 3px !important;
}

.carousel {
    height: 100% !important;
}

#modal .modal-dialog {
    height: 90vh;
    margin: 30px auto;
    width: 90vw;
}

#modal .modal-dialog .modal-content {
    height: 100%;
}

#modal .modal-dialog .modal-body {
    height: 91%;
}

@media screen and (max-width: 1360px) {
    #modal .modal-dialog .modal-body {
        height: 91%;
    }
}

@media screen and (max-width: 479px) {
    #modal .modal-dialog .modal-body {
        height: 88%;
    }
}

#modal .modal-dialog .modal-body iframe {
    height: 100%;
}
* {
  margin:0;
  padding:0;
  font-family:"Helvetica Neue", Helvetica, Sans-serif;
  word-spacing:-2px;
}

h1 {
  font-size:40px;
  font-weight:bold;
  color:#191919;
  -webkit-font-smoothing: antialiased;
}

h2 {
  font-weight:normal;
  font-size:20px;
  color:#888;
  padding:5px 0;
}

.message {
background:#181818;
color:#FFF;
position: absolute;
top: -250px;
left: 0;
width: 100%;
height: 250px;
padding: 20px;
transition: top 300ms cubic-bezier(0.17, 0.04, 0.03, 0.94);
overflow: hidden;
box-sizing: border-box;
  
}

.message h1 {
  color:#FFF;
}

#toggle:checked ~ .message {
  top: 0;
}

#toggle:checked ~ .container {
  margin-top: 250px;
}

#toggle:checked + label {
  background:#dd6149;
}



');
?>

<div id="border">
    <?php if (isset($regularities) && !empty($regularities)): ?>
        <div id="picture" style="background: url('/images/office.jpg'); background-size: cover">
            <div id="name_on_picture" style="">
                <h2 class="h-text">Публичный регламент</h2>
            </div>
            <input type="checkbox" name="toggle" id="toggle" style="display: none;"/>
            <label for="toggle"></label>

            <div class="message"><h1> Ваш
                    ранг: <?php echo isset(\forma\modules\core\records\User::find()->where(['id' => Yii::$app->user->id])->one()->userProfile->rank)?\forma\modules\core\records\User::find()->where(['id' => Yii::$app->user->id])->one()->userProfile->rank->name :'у вас еще нет ранга' ?></h1>
                <h2>Вы можете перейти по ссылке <a href="/core/user-profile">ПРОФИЛЬ</a></h2>
            </div>

            <div class="navigator-pane" id="public_for_newUser" style=" justify-content: center; ">
                <button class='btn btn-light' style="background-color: #F08080; color: white"
                        onclick="window.location.href='/'"
                        style="margin-bottom: 20px;">
                    <i class="fas fa-ban" style="color: white; margin-right: 5px;"></i>
                    Пропустить обучение
                </button>
                <button class='btn btn-light' style="background-color: #00a65a; color: white"
                        onclick="public_for_newUser.style.display = 'none'; usualReglament.style.display = 'flex'"
                        style="background-color: #3c8dbc; color: #fff;     margin-bottom: 20px;">
                    Продолжить обучение <i class="fas fa-arrow-right" style="color: white; margin-left: 5px"></i>
                </button>
                <?php if (isset(\forma\modules\core\records\User::find()->where(['id' => Yii::$app->user->id])->one()->userProfile)) { ?>
                    <button title="Профиль" class='btn btn-light' style="background-color:cadetblue; color: white" onclick="openProfile()">
                        <i class="fas fa-user" style="color: white;"></i>
                    </button>
                <?php } ?>
            </div>
            <div class="navigator-pane" id="usualReglament" style=" justify-content: center; ">
                <button class='btn btn-light navigator prev' id="prev_step" onclick="event.stopPropagation()"
                        style="margin-bottom: 20px; margin-bottom: 20px; background: #555;">
                    <i class="fas fa-arrow-left" style="color: white; margin-right: 5px"></i> Назад
                </button>
                <button class='btn btn-warning' id="main_panel" onclick="window.location.href='/'"
                        style="margin-bottom: 20px;">
                    <i class="fas fa-chart-line"></i> К главной панели
                </button>
                <button class='btn btn-light navigator next' id="next_step" onclick="event.stopPropagation()"
                        style="background-color: #3c8dbc; color: #fff;     margin-bottom: 20px;">
                    Вперед <i class="fas fa-arrow-right" style="color: white; margin-left: 5px"></i>
                </button>
                <?php if (isset(\forma\modules\core\records\User::find()->where(['id' => Yii::$app->user->id])->one()->userProfile)) { ?>
                    <button title="Профиль" class='btn btn-light' style="background-color:cadetblue; color: white" onclick="openProfile()">
                        <i class="fas fa-user" style="color: white;"></i>
                    </button>
                <?php } ?>
            </div>





        </div>

        <div id="nav-tabs" class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <?php foreach ($regularities as $regularity): ?>
                    <?php
                    $countRegularityItem=0; $countRightRegularityItem =0;
                    ?>
                    <li class=" <?php if ($regularity->id == $regularities[0]->id) echo 'active'; ?> "
                        data-href="tab_regularity_<?= $regularity['id'] ?>">
                        <a href="#tab_regularity_<?= $regularity['id'] ?>"
                           class="change-regularity"
                           data-toggle="tab"
                           data-href="tab_regularity_<?= $regularity['id'] ?>"
                           data-name="<?= "<h2> <i style='margin-right: 30px;' class='fa fa-$regularity->icon'></i> 
                            $regularity->name ".(($countRegularityItem >0 && $countRegularityItem<=$countRightRegularityItem)
                               ?"<i style='color:green;padding-right: 10px;' class='fa fa-check-circle'></i>":"")."</h2>" ?>"
                           data-picture="<?= is_null($regularity->picture) ? 'false' : $regularity->picture ?>"
                           aria-expanded="<?= $regularity->id == $regularities[0]->id ? 'true' : '' ?>">
                            <i class="fa fa-<?=$regularity->icon?>"></i> <?= $regularity['name'] ?><?=
                            (($countRegularityItem >0 && $countRegularityItem<=$countRightRegularityItem)
                               ?"<i style='color:green;padding-left: 10px;' class='fa fa-check-circle'></i>":"") ?>
                            <input type="hidden" class="hidden-description" value="<?=htmlspecialchars($regularity->title)?>">
                            <div class="hidden-description" style="visibility: hidden; display: none;">
                                <?= $regularity->title ?></div>
                            <section></section>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>




            <div class="tab-content" style="padding: 10px 0px 0">
                <?php foreach ($regularities as $regularity): ?>

                    <div class="tab-pane <?= $regularity->id == $regularities[0]->id ? 'active' : '' ?>"
                         id="tab_regularity_<?= $regularity['id'] ?>">

                        <?php if ($regularity === $regularities[0]): ?>
                            <script>

                                changeArea('<?= $regularity->title ?>',
                                    "<?= '<h2>' .'<i style=\' margin-right: 30px; \' class=\'fa fa-' . $regularity->icon . ' \'></i>  ' . $regularity->name . '</h2>' ?>",

                                    '<?= is_null($regularity->picture) ? '/images/office.jpg' : $regularity->picture ?>');
                            </script>
                        <?php endif; ?>

                        <?= $this->render('user-main-item', [
                            'regularity' => $regularity,
                            'items' => $items,
                            'subItems' => $subItems,
                            'newUserReglament' => $newUserReglament,

                        ]) ?>

                    </div>
                <?php endforeach; ?>
            </div>

            <div id="text-div" style="padding: 0 10px;">

            </div>
            <br><br><br>
        </div>
    <?php else: ?>
        <?php if (!Yii::$app->user->isGuest){
            echo '<br><br><br>';
        }
        echo 'Регламентов или юзера не существует' ?>
    <?php endif; ?>
</div>



<?php




$js = <<<JS
var i = 1;
//$("#about_regularity")[0].href = '#';
document.getElementsByClassName('change-regularity')[0].dispatchEvent((new Event("click")));
//document.getElementsByClassName('change-regularity')[0].innerText = document.getElementsByClassName('change-regularity')[0].inn.replace('">', '');
$("#fs").click(function () {
   i++;
  if($.support.fullscreen){
	$("body").fullScreen();
	if (i % 2 == 0) {
	  $("#fs").html($('<i class="fa fa-compress"></i>'));
	} else {
	  $("#fs").html($('<i class="fa fa-expand"></i>'));
	}
  } else {
    alert('Фул скрин не подключен');
  }
});
JS;
$this->registerJs($js);
?>

<script>
    function openProfile(){
        $('#toggle').click();
    }
    let newUserReglament = <?=$newUserReglament?>;
    console.log(newUserReglament);
    if (newUserReglament) {
        public_for_newUser.style.display = 'flex';
        usualReglament.style.display = 'none';
    } else {
        usualReglament.style.display = 'flex';
        public_for_newUser.style.display = 'none';
    }

    let modalBtnArr = document.querySelector('a');

    for (let i = 0; i < modalBtnArr.length; i++) {
        console.log('9');
        modalBtnArr[i].style.border = '1px solid blue';
        modalBtnArr[i].className += " btn-xs";
        console.log(7);

        modalBtnArr[i].addEventListener('click', {
            handleEvent(event) {
                document.getElementById('myFrame').style.height = '100%';
                //alert(event.type + " на " + event.currentTarget);
            }
        });
    }
    console.log('sss');
    document.getElementsByClassName('change-regularity')[0].dispatchEvent((new Event("click")));
</script>
