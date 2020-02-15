<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model forma\modules\worker\records\Worker */

$this->title = Yii::t('app', 'Новый кадр');
$this->params['homeLink'] = ['label' => 'Панель упраления', 'url' => '/hr', 'title' => 'Панель управления модулем найма'];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Кадры'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worker-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
