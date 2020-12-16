<?php

use backend\assets\AppAsset;
use yii\bootstrap\Modal;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

dmstr\web\AdminLteAsset::register($this);
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
    <?php if (!isset($_GET['without-header'])) :
        Yii::debug('JIVO SITE');

        ?>
        <!-- BEGIN JIVOSITE CODE {literal} -->
        <script type='text/javascript'>
            (function () {
                var widget_id = 'OG66j2R9YL';
                var d = document;
                var w = window;

                function l() {
                    var s = document.createElement('script');
                    s.type = 'text/javascript';
                    s.async = true;
                    s.src = '//code.jivosite.com/script/widget/' + widget_id
                    ;var ss = document.getElementsByTagName('script')[0];
                    ss.parentNode.insertBefore(s, ss);
                }

                if (d.readyState == 'complete') {
                    l();
                } else {
                    if (w.attachEvent) {
                        w.attachEvent('onload', l);
                    } else {
                        w.addEventListener('load', l, false);
                    }
                }
            })();
        </script>
        <!-- {/literal} END JIVOSITE CODE -->
    <?php endif ?>

</head>
<body class="login-page">

<?php $this->beginBody() ?>

    <?= $content ?>
    <?= Modal::widget([
        'id' => 'modal',
        'header' => '<p>FORMA . INGELLO 2021</p>',

    ]) ?>

    <?= Modal::widget([
        'id' => 'select-modal-2',
        'header' => 'FORMA . INGELLO 2020',
    ]) ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
