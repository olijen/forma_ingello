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
        color: black;
    }
</style>
<div class="col-md-4" style="min-height: 200px;">
    <h1 style="text-align: center">Процесс</h1>
    <div class="social-links" style="padding: 5px;">
        <?php
        foreach ($ranks as $rank) {
            foreach ($rank->rules as $rule) {

                ?>
                <?php if ($rule->count_action == count($rule->userProfileRules)) { ?>
                    <a style="background: green" title="<?= $rule->rule_name ?>"><i
                                class="fa <?= $rule->icon ?>"></i></a>
                <?php } else { ?>
                    <a style="background: darkred" title="<?= $rule->rule_name ?>"><i class="fa <?= $rule->icon ?>"></i></a>
                <?php } ?>
            <?php }
        } ?>
    </div>
</div>