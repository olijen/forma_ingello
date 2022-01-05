<?php

use forma\modules\core\records\Rank;
use forma\modules\core\records\UserProfile;

/* @var $ranks Rank[] */
/* @var $currenUser UserProfile */
?>
<style>
    .links a {
        text-align: center;
        float: left;
        width: 100px;
        height: 100px;
        border: 1px solid #909090;
        border-radius: 100%;
        margin: 7px; /*space between*/

    }

    .links a i {
        font-size: 50px;
        line-height: 90px;
        color: black;
    }
</style>

<div class="col-md-4" style="min-height: 450px; margin: 0 auto;">
    <h1 style="text-align: center">Процесс</h1>
    <div class="links" style="padding: 5px; display: flex; justify-content: center; align-items: center;">
        <?php
        foreach ($ranks as $rank) {
            foreach ($rank->rules as $rule) {
                $countBall = 0;
                foreach ($currenUser->userProfileRules as $profileRule) {
                    if($profileRule->rule_id == $rule->id){
                        $countBall++;
                    }
                }
                ?>
                <?php if ($rule->count_action == $countBall) { ?>
                    <a style="background: green" title="<?= $rule->rule_name ?>"><i
                                class="fa <?= $rule->icon ?>"></i></a>
                <?php } else { ?>
                    <a style="background: darkred" title="<?= $rule->rule_name ?>"><i
                                class="fa <?= $rule->icon ?>"></i></a>
                <?php } ?>
            <?php }
        } ?>
    </div>
</div>