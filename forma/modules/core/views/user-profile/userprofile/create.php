<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\UserProfile */

$this->title = 'Добавление игрового профиля';
$this->params['breadcrumbs'][] = ['label' => 'Профили пользователей', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$user = \forma\modules\core\records\UserProfile::find()->where(['user_id' => Yii::$app->user->id])->one();
?>
<div class="user-profile-create">
    <?php if (empty($user)) { ?>
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    <?php } else{ ?>
    <p>У вас уже есть профиль перейти по ссылке <a href="/core/user-profile/">Перейти</a></p>
    <?php } ?>
</div>
