<?php

use forma\modules\core\records\Rank;
use forma\modules\core\records\UserProfile;

/* @var $ranks Rank[] */
/* @var $currenUser UserProfile */
forma\assets\AppAsset::register($this);
?>
<style>
    .login-page{
        background: #8f5d102e;
    }
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

    .fourval {
        border: solid lightgreen;
        border-width: thin medium thick 1em;
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
                    <h1 style="text-align: center"> <?= $currenUser->user->username ?></h1>
                    <div class="text-center">
                        <img style="width: 200px; height: 200px;"
                             src="https://st03.kakprosto.ru/tumb/680/images/article/2011/9/16/1_52552c35c5b0852552c35c5b46.png"
                             class="img-circle"
                             alt="User Image"/>
                    </div>
                    <h4 class="fourval" style="float: left; height: 150px; width: 50%; padding: 10px;">Ранг: <p
                                style="word-wrap: break-word;text-align: center; padding-top: 20px;"><?= $currenUser->rank->name ?></p>
                    </h4>
                    <h4 class="fourval" style="word-wrap: break-word;float: right; height: 150px; width: 50%; padding: 10px;">Количество
                        баллов:
                        <p style="word-wrap: break-word;text-align: center; padding-top: 20px;"><?= isset($currenUser->userProfileRules) ? count($currenUser->userProfileRules) : 0 ?></p>
                    </h4>
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