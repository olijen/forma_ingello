<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\Regularity */

//$this->title = Yii::t('app', 'Создать Регламент');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Регламенты'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regularity-create">

    <?php BoxWidget::begin([
    'title'=>'Регламент: форма добавления',
    ]);
    ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?php BoxWidget::end();?>

</div>
