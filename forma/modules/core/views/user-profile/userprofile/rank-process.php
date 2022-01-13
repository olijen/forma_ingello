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

    .links {
        padding: 5px;
    }

    .link-active {
        background: green;
    }

    .link-inactive {
        background: darkred;
    }
</style>

<div class="col-md-3 col-sm-12 col-12 stretch-card">
    <div class="box box-success">
        <div class="box-header with-border big_widget_header">
            <h3 class="box-title">
                Награды
            </h3>
        </div>
        <div class="box-body">
            <div class="links">
                <?php
                foreach ($ranks as $rank) {
                    foreach ($rank->rules as $rule) {
                        $iconName = "";
                        foreach ($icons as $key=>$icon){
                            if($key == $rule->icon){
                                $iconName = $icon;
                            }

                        }
                        $countBall = 0;
                        foreach ($currenUser->userProfileRules as $profileRule) {
                            if ($profileRule->rule_id == $rule->id) {
                                $countBall++;
                            }
                        }
                        ?>
                        <?php if ($rule->count_action == $countBall) { ?>
                            <a class="link-active" href="<?= $rule->link ?>" title="<?= $rule->rule_name ?>"><i
                                        class="fa fa-<?= $iconName ?>"></i></a>
                        <?php } else { ?>
                            <a class="link-inactive" href="<?= $rule->link ?>" title="<?= $rule->rule_name ?>"><i
                                        class="fa fa-<?= $iconName ?>"></i></a>
                        <?php } ?>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
</div>