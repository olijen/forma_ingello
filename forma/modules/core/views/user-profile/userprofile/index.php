<?php

use forma\modules\core\records\Rank;
use forma\modules\core\records\UserProfile;

/* @var $ranks Rank[] */
/* @var $currenUser UserProfile */
?>

<div class="container" style="width: 100%;">
    <div class="row">
        <section style="min-height: 450px;">
            <div class="col-md-4">
                <h1 style="text-align: center"> <?= Yii::$app->user->getIdentity()->username ?>
                   </h1>
                <li class="user-header" >
                    <img style="width: 300px;height: 300px;" src=""
                         class="img-circle"
                         alt="User Image"/>
                </li>
                <div class="row">
                    <divclass="col">
                        Rank:
                    </div>
                    <div class="col">

                        Number of rules executed:
                    </div>
                </div>
            </div>
            <?= $this->render('/user-profile/userprofile/rank-process', [
                'ranks' => $ranks,
                'currenUser' => $currenUser,
            ]) ?>
            <?= $this->render('/user-profile/userprofile/chart-process-rank', [
            ]) ?>
        </section>
        <div class="col-md-12" style="padding-top: 100px;">
            <h1 style="text-align: center">Картинка</h1>
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
