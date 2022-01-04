<?php

use forma\modules\core\records\Rank;

/* @var $ranks Rank[] */
?>
<style>
    .social-links a {
        text-align: center;
        float: left;
        width: 100px;
        height: 100px;
        border: 1px solid #909090;
        border-radius: 100%;
        margin: 7px; /*space between*/

    }

    .social-links a i {
        font-size: 50px;
        line-height: 90px;
        color: #909090;
    }
</style>
<div class="col-md-4">
    <h1 style="text-align: center">Процесс</h1>
    <div class="social-links" style="padding: 5px;">
        <?php
        foreach ($ranks as $rank) {
            foreach ($rank->rules as $item) {
                ?>
                <a title="<?= $item->rule_name ?>"><i class="fa <?= $item->icon ?>"></i></a>
            <?php }
        } ?>
    </div>
</div>
<!--<a><i class="fa fa-user fa-lg"></i></a>
                <a href="#"><i style="color: green;" class="fa fa-male fa-lg"></i></a>
                <a href="#"><i class="fa fa-users fa-lg"></i></a>
                <a href="#"><i class="fa fa-user-secret fa-lg"></i></a>-->