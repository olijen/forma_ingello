<?php

use forma\modules\core\records\Rank;
use forma\modules\core\records\UserProfile;

/* @var $ranks Rank[] */
/* @var $currenUser UserProfile */
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
</style>

<div class="container" style="width: 100%;">
    <div class="row">
        <div class="col-md-4 col-sm-12 col-12 stretch-card" style="min-height: 450px;">
            <div class="box box-success">
                <div class="box-header with-border big_widget_header">
                    <h3 class="box-title">
                        Профиль
                    </h3>
                </div>

                <div class="box-body">
                    <h1 style="text-align: center"> <?= Yii::$app->user->getIdentity()->username ?>
                        <small><?= Yii::$app->user->getIdentity()->role ?></small></h1>
                    <img style="width: 100px; height: 100px;"
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