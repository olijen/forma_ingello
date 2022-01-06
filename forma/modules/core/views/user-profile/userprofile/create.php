<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\UserProfile */

$this->title = 'Добавление игрового профиля';
$this->params['breadcrumbs'][] = ['label' => 'Профили пользователей', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
