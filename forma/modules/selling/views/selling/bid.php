<?php
use yii\helpers\Html;
$this->title = 'Быстрая ставка на FLH';
?>

<form action="/selling/selling/create-bid">
    <?= Html:: hiddenInput(
        \Yii::$app->getRequest()->csrfParam,
        \Yii :: $app->getRequest()->getCsrfToken(), []
    ); ?>

    Ссылка: <br><input type="text" name="link" /><br>
    Текст: <br><textarea type="text" name="text"></textarea>
    <br>
    <br>

    <input class="btn btn-warning" type="submit" />
</form>
