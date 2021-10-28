<?php

use yii\helpers\Html;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\core\records\AccessInterface */

$this->title = 'Создать Интерфейс доступа';
$this->params['breadcrumbs'][] = ['label' => 'Интерфейсы доступа', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="access-interface-create">

    <?php BoxWidget::begin([
    'title'=>'Интерфейс доступа: форма добавления',
    ]);
    ?>

    <?= $this->render('_form', [
        'model' => $model,
        'rules'=>$rules,
        'users'=>$users,
    ]) ?>

    <?php BoxWidget::end();?>

</div>
