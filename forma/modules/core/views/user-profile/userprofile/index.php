<?php

use forma\modules\core\records\Rank;
use forma\modules\core\records\UserProfile;
use forma\modules\core\services\UserProfileChartService;

$userProfileChart = new UserProfileChartService();


/* @var $ranks Rank[] */
/* @var $currenUser UserProfile */
?>
<div class="container" style="width: 100%;">
    <div class="row">
        <section style="min-height: 450px;">
            <div class="col-md-4">
                <h1 style="text-align: center"> <?= Yii::$app->user->getIdentity()->username ?>
                    <small><?= Yii::$app->user->getIdentity()->role ?></small></h1>
                <li class="user-header">
                    <img src="https://st03.kakprosto.ru/tumb/680/images/article/2011/9/16/1_52552c35c5b0852552c35c5b46.png"
                         class="img-circle"
                         alt="User Image"/>
                </li>
                <div class="block_rank">
                    <div class="user_rank">
                        Rank: <?php ?>
                    </div>
                    <div class="number_rules">

                        Number of rules executed: <?php ?>
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
<style>
    div.block_rank {
        width:450px;
    }
    div.user_rank {
        float:left;
        width:200px;
    }
    div.number_rules {
        float:right;
        width:200px;
    }
</style>
<script>

    myChart = new Chart(document.getElementById('myChart').getContext('2d'), {
        type: 'line',
        data: {
            labels: [<?=$userProfileChart->getDate()?>],
            datasets: [{
                label: 'Количество изменений',
                data: [<?=$userProfileChart->getCount()?>],
                backgroundColor: ['transparent'],
                borderColor: ['green'],
            }]
        },
        options: {}
    });
</script>