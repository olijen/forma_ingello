<?php

use yii\helpers\Html;
use dmstr\helpers\AdminLteHelper;
use yii\bootstrap\Modal;

/* @var $this \yii\web\View */
/* @var $content string */

if (Yii::$app->controller->action->id === 'login') { 
/**
 * Do not use this code in your template. Remove it. 
 * Instead, use the code  $this->layout = '//main-login'; in your controller.
 */
    echo $this->render(
        'main-login',
        ['content' => $content]
    );
} else {

    if (class_exists('backend\assets\AppAsset')) {
        backend\assets\AppAsset::register($this);
    } else {
        forma\assets\AppAsset::register($this);
    }

    dmstr\web\AdminLteAsset::register($this);

    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>

        <!-- BEGIN JIVOSITE CODE {literal} -->
        <script type='text/javascript'>
            (function(){ var widget_id = 'OG66j2R9YL';var d=document;var w=window;function l(){
                var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true;
                s.src = '//code.jivosite.com/script/widget/'+widget_id
                ; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}
                if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}
                else{w.addEventListener('load',l,false);}}})();
        </script>
        <!-- {/literal} END JIVOSITE CODE -->

    </head>
    <body id="body1" class="hold-transition sidebar-mini sidebar-collapse <?= AdminLteHelper::skinClass() ?>">
    <?php $this->beginBody() ?>
    <div class="wrapper">

        <?= $this->render(
            'header.php',
            ['directoryAsset' => $directoryAsset]
        ) ?>

        <?= $this->render(
            'left.php',
            ['directoryAsset' => $directoryAsset]
        )
        ?>

        <?= $this->render(
            'content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>

    </div>

    <?= Modal::widget([
        'id' => 'select-modal',
        'header' => 'FORMA . INGELLO 2020 - закажи индивидуальную систему',
    ]) ?>

    <?php $this->endBody() ?>

    <?php if (isset($_GET['without-header'])) {
        echo "<style> .navbar-static-top {display: none;} </style>";
        echo "<style> #jvlabelWrap {display: none;} </style>";
    }

    ?>

    </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>
