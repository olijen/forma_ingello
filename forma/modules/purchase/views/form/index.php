<?php

use forma\modules\core\Module;
use forma\modules\purchase\records\purchase\Purchase;
use forma\modules\purchase\widgets\NomenclatureView;
use forma\modules\purchase\widgets\PurchaseFormView;
use yii\helpers\Url;
use forma\modules\purchase\widgets\AddingFormView;

/**
 * @var $model Purchase
 * @var $this yii\web\View
 * @var $form yii\widgets\ActiveForm
 */

$this->title = $model->isNewRecord ? 'Создать поставку' : $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Поставки', 'url' => Url::to(['/purchase/main'])];


?>

<?= PurchaseFormView::widget(['model' => $model]) ?>

<?php /** @var Module $core */
    $core = Yii::$app->getModule('core');
    echo $core->getStateWidget(['model' => $model]);
?>

<?= NomenclatureView::widget(['purchaseId' => $model->id]) ?>
