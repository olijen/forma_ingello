<?php

use forma\modules\core\records\Rank;
use forma\modules\core\records\UserProfile;

/* @var $ranks Rank[] */
/* @var $currenUser \forma\modules\core\records\User */
$myAssetBundle = forma\assets\AppAsset::register($this);

if (isset($currenUser->userProfile->image))
    $fileName = $myAssetBundle->baseUrl . "/img/user-profile/" . $currenUser->userProfile->image;
else
    $fileName = $myAssetBundle->baseUrl . "/img/user-profile/defaultImage.png";

?>
    <style>
        .login-page {
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
            min-height: 450px;
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
            float: left;
            height: 150px;
            width: 50%;
            padding: 10px;
            word-wrap: break-word;
        }

        .container {
            width: 100%;
        }

        .img-circle {
            width: 200px;
            height: 200px;
        }

        .ball-rank {
            word-wrap: break-word;
            text-align: center;
            padding-top: 20px;
        }

        .rank-image {
            width: 100%;
            height: 100%;
        }

        .pull-right {
            padding: 10px;
        }

        .box-title {
            padding: 10px;
        }
    </style>
<?php if (isset(\forma\modules\core\records\User::find()->where(['id' => Yii::$app->user->id])->one()->userProfile)) { ?>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-12 col-12 stretch-card">
                <div class="box box-success">
                    <div class="box-header with-border big_widget_header">
                        <h3 class="box-title">
                            Профиль
                        </h3>
                        <div class="box-tools pull-right">
                            <a href="/core/user-profile/update/?id=<?= $currenUser->userProfile->id ?>"
                               class="btn btn-success forma_green"> <i class="fa fa-edit"></i> Обновить профиль </a>
                        </div>
                    </div>

                    <div class="box-body">
                        <h1 class="text-center"> <?= $currenUser->username ?></h1>
                        <div class="text-center">
                            <img
                                    src="<?= $fileName ?>"
                                    class="img-circle"
                                    alt="User Image"/>
                        </div>
                        <h4 class="fourval">Ранг: <p
                                    class="ball-rank"><?= isset($currenUser->userProfile->rank->name) ? $currenUser->userProfile->rank->name : 'нет ранга' ?></p>
                        </h4>
                        <h4 class="fourval">Количество
                            баллов:
                            <p class="ball-rank"><?= isset($currenUser->userProfileRules) ? count($currenUser->userProfileRules) : 0 ?></p>
                        </h4>
                    </div>
                </div>

            </div>
            <?= $this->render('/user-profile/userprofile/rank-process', [
                'ranks' => $ranks,
                'currenUser' => $currenUser,
                'icons' => $icons,
            ]) ?>
            <?= $this->render('/user-profile/userprofile/chart-process-rank') ?>
        </div>
        <div class="col-md-12">
            <div class="text-center">
                <?php if (isset($currenUser->userProfile->rank->image)) { ?>
                    <img class="rank-image"
                         src="/img/user-profile/<?= $currenUser->userProfile->rank->image ?>">
                <?php } else{ ?>
                    <img class="rank-image"
                         src="/img/user-profile/stol.png">
            <?php } ?>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div>
        У вас нет игрового профиля, ссылка на создание игрового профиля: <a href="/core/user-profile/create">создать
            профиль</a>
    </div>
<?php } ?>