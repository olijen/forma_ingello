<?php

use forma\modules\core\records\Rank;

/* @var $ranks Rank */
?>
<div class="container" style="width: 100%;">
    <div class="row">
        <section style="min-height: 350px;">
            <div class="col-md-4">
                <h1 style="text-align: center">Профиль</h1>
            </div>
            <?= $this->render('/user-profile/userprofile/rank-process', [
                'ranks' => $ranks

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
