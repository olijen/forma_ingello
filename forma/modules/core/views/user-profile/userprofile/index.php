<?php

use forma\modules\core\records\Rank;
use forma\modules\core\records\UserProfile;

/* @var $ranks Rank[] */
/* @var $currenUser UserProfile */
forma\assets\AppAsset::register($this);
?>
<style>
    .row {
        display: flex;
        flex-wrap: wrap;
        padding: 10px;
    }

    .stretch-card {
        display: -webkit-flex;
        display: flex;
        -webkit-align-items: stretch;
        align-items: stretch;
        -webkit-justify-content: stretch;
        justify-content: stretch;
    }

    @media (max-width: 990px) {
        .stretch-card {
            width: 100%;
            min-width: 100%;
        }
    }
    canvas {
        background-color: #eee;
    }
</style>

<div class="container" style="width: 100%;">
    <div class="row">
        <div class="col-md-3 col-sm-12 col-12 stretch-card" style="min-height: 450px;">
            <div class="box box-success">
                <div class="box-header with-border big_widget_header">
                    <h3 class="box-title">
                        Профиль
                    </h3>
                </div>

                <div class="box-body">
                    <h1 style="text-align: center"> <?= Yii::$app->user->getIdentity()->username ?>
                        <small><?= Yii::$app->user->getIdentity()->role ?></small></h1>
                    <img style="width: 200px; height: 200px; "
                         src="https://st03.kakprosto.ru/tumb/680/images/article/2011/9/16/1_52552c35c5b0852552c35c5b46.png"
                         class="img-circle"
                         alt="User Image"/>
                    <div class="block_rank">
                        <div class="user_rank">
                            Rank: <?php ?>
                        </div>
                        <div class="number_rules">

                            Number of rules executed: <?php ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <?= $this->render('/user-profile/userprofile/rank-process', [
            'ranks' => $ranks,
            'currenUser' => $currenUser,
        ]) ?>
        <?= $this->render('/user-profile/userprofile/chart-process-rank', [
        ]) ?>
    </div>
    <div class="col-md-12">
        <h1 style="text-align: center">Картинка</h1>
<!--        --><?php
//        $path = \Yii::getAlias('@rank') ;
//        $file = $path . '/' . $ranks[0]->image;
//        de(\yii\helpers\Html::img('img.jpg'));
////      echo  \yii\helpers\Html::img('img.jpg')
//?>

        <div style="text-align: center">
            <img style="width: 100%; height: 200px; "
                 src="512.jpg"

        </div>
    </div>
</div>
<script>
    (function () {
        var tId = setInterval(function () {
            if (document.readyState == "complete") onComplete()
        }, 800);

        function onComplete() {
            clearInterval(tId);
            $('.globalClass_2ebe').remove();
        };
    })()
</script>