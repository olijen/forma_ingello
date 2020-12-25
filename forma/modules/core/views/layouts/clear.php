<?php

use yii\helpers\Url;
use yii\helpers\Html;
use keygenqt\autocompleteAjax\AutocompleteAjax;
use forma\modules\product\records\Product;
use dmstr\helpers\AdminLteHelper;
use yii\bootstrap\Modal;

/* @var $this \yii\web\View */
/* @var $content string */

if (Yii::$app->controller->action->id === 'login') {
    /**
     * Do not use this code in your template. Remove it.
     * Instead, use the code  $this->layout = '//main-login'; in your controller.
     */
    echo $this->render(
        'main-login',
        ['content' => $content]
    );
} else {


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

        <!-- todo: Перенести в зависимости -->
        <script src="https://code.jquery.com/jquery-migrate-3.0.1.js"></script>
    </head>
    <body id="body1" class="hold-transition sidebar-mini sidebar-collapse <?= AdminLteHelper::skinClass() ?>">
    <?php $this->beginBody() ?>
        <?=$content?>
    <?php $this->endBody() ?>

    </body>

    </html>
    <?php $this->endPage() ?>
<?php } ?>
