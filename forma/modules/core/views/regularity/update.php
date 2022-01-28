<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\Regularity */

$this->title = Yii::t('app', 'Редактировать Регламент: ', [
    'modelClass' => 'Regularity',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Регламенты'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Редактировать');
?>
<div class="regularity-update">

    <?php BoxWidget::begin([
    'title'=>'Регламент: форма редактирования',
    ]);
    ?>

    <?= $this->render('_form', [
    'model' => $model,
        'icons' => $icons,
    ]) ?>

    <?php BoxWidget::end();?>

</div>
