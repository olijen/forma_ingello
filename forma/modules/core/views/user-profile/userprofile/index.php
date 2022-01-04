<div class="container" style="width: 100%;">
    <div class="row">
        <div class="col-md-4">
            <h1 style="text-align: center"> <?= Yii::$app->user->getIdentity()->username ?>
                <small><?= Yii::$app->user->getIdentity()->role ?></small></h1>
            <li class="user-header">
                <img src="https://st03.kakprosto.ru/tumb/680/images/article/2011/9/16/1_52552c35c5b0852552c35c5b46.png"
                     class="img-circle"
                     alt="User Image"/>
            </li>
            <div class="user_rank">
                Rank: <?php ?>
            </div>
            <div class="number_rules">

                Number of rules executed: <?php ?>
            </div>
        </div>
        <?= $this->render('/user-profile/userprofile/rank-process', [

        ]) ?>
        <?= $this->render('/user-profile/userprofile/chart-process-rank', [

        ]) ?>
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
    .user_rank {
        padding: 5px; /* Поля вокруг текста */
        float: left; /* Обтекание по правому краю */
        width: 200px; /* Ширина слоя */
    }
    .number_rules {
        padding: 5px; /* Поля вокруг текста */
        width: 300px; /* Ширина слоя */
        float: left; /* Обтекание по правому краю */
    }
</style>