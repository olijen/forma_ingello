<?php

use forma\modules\core\records\Rank;
use forma\modules\core\records\UserProfile;

/* @var $ranks Rank[] */
/* @var $currenUser UserProfile */
$myAssetBundle = forma\assets\AppAsset::register($this);
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
                        Профиль <a href="/core/user-profile/update/?id=<?= $currenUser->id ?>">Обновить профиль</a>
                    </h3>
                </div>

                <div class="box-body">
                    <h1 style="text-align: center"> <?= $currenUser->user->username ?></h1>
                    <div class="text-center">
                        <img style="width: 200px; height: 200px;"
                             src="<?= $myAssetBundle->baseUrl . "/img/user-profile/$currenUser->image";?>"
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
<!--        --><?php
        $path = \Yii::getAlias('@rank') ;
        $file = $path . '/' . $ranks[0]->image;
//        echo (\yii\helpers\Html::img($file));
////      echo  \yii\helpers\Html::img('img.jpg')
//?>

        <div style="text-align: center">
            <img style="width: 100%; height: 200px; "
                 src="/img/user-profile/512.jpg">


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