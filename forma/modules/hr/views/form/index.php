<?php

use forma\modules\hr\records\interview\Interview;
use forma\modules\hr\widgets\SellingFormView;
use forma\modules\hr\widgets\NomenclatureView;
use yii\helpers\Url;

/**
 * @var $model Interview
 */

$this->title = 'Новый найм от ' . Yii::$app->formatter->asDatetime($model->date_create, 'php:d.m.Y');
if ($model->date_complete) {
    $this->title .= ' до ' . Yii::$app->formatter->asDatetime($model->date_complete, 'php:d.m.Y');
}
$this->title .= ' (' . Yii::$app->getUser()->getIdentity()->username . ')';
$this->params['homeLink'] = ['label' => 'Панель упраления', 'url' => '/hr', 'title' => 'Панель управления модулем найма'];
$this->params['breadcrumbs'][] = ['label' => 'Найм', 'url' => Url::to(['/hr/main'])];
$this->params['breadcrumbs'][] = $this->title;

?>

<?= SellingFormView::widget(compact('model')) ?>

<?= Yii::$app->getModule('core')->getStateWidget(compact('model')) ?>

