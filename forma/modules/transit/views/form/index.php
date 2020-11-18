<?php

use forma\modules\transit\records\transit\Transit;
use forma\modules\transit\widgets\NomenclatureView;
use forma\modules\transit\widgets\TransitFormView;
use forma\modules\transit\widgets\AddingFormView;
use yii\helpers\Url;

/**
 * @var $model Transit
 */

$this->title = $model->isNewRecord ? 'Создать перемещение' : $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Перемещения', 'url' => Url::to(['/transit/main'])];


?>

<?= TransitFormView::widget(compact('model')) ?>

<?= Yii::$app->getModule('core')->getStateWidget(compact('model')) ?>

<?= NomenclatureView::widget(['transitId' => $model->id, 'warehouseId' => $model->from_warehouse_id]) ?>
