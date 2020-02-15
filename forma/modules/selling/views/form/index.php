<?php

use forma\modules\selling\records\selling\Selling;
use forma\modules\selling\widgets\SellingFormView;
use forma\modules\selling\widgets\NomenclatureView;
use yii\helpers\Url;

/**
 * @var $model Selling
 */

$this->title = 'Новая продажа от ' . Yii::$app->formatter->asDatetime($model->date_create, 'php:d.m.Y');
if ($model->date_complete) {
    $this->title .= ' до ' . Yii::$app->formatter->asDatetime($model->date_complete, 'php:d.m.Y');
}
$this->title .= ' (' . Yii::$app->getUser()->getIdentity()->username . ')';

$this->params['breadcrumbs'][] = ['label' => 'Продажи', 'url' => Url::to(['/selling/main'])];
$this->params['breadcrumbs'][] = $this->title;

?>

<?= SellingFormView::widget(compact('model')) ?>

<?= Yii::$app->getModule('core')->getStateWidget(compact('model')) ?>

<?= NomenclatureView::widget(['sellingId' => $model->id]) ?>
