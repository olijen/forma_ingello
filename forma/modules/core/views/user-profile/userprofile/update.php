<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\UserProfile */
/* @var $modelUser \forma\modules\core\records\User */

$this->title = 'Редактировать Профиль пользователя: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Профили пользователей', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="user-profile-update">

    <?php BoxWidget::begin([
    'title'=>'Профиль пользователя: форма редактирования',
    ]);
    ?>

    <?= $this->render('_form', [
    'model' => $model,
    'modelUser' => $modelUser,
    ]) ?>

    <?php BoxWidget::end();?>

</div>
