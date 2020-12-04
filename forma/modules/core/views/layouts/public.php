<?php

use backend\assets\AppAsset;
use yii\bootstrap\Modal;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

dmstr\web\AdminLteAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>
<body class="login-page">

<?php $this->beginBody() ?>

    <?= $content ?>
    <?= Modal::widget([
        'id' => 'select-modal',
        'header' => 'FORMA . INGELLO 2020 - закажи индивидуальную систему',
    ]) ?>

    <?= Modal::widget([
        'id' => 'select-modal-2',
        'header' => 'FORMA . INGELLO 2020',
    ]) ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
