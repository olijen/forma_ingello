<?php

use forma\modules\core\widgets\StateView;
use forma\modules\purchase\records\purchase\Purchase;
use forma\modules\purchase\widgets\NomenclatureView;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\widgets\Pjax;

/**
 * @var $model Purchase
 * @var $this yii\web\View
 * @var $form yii\widgets\ActiveForm
 */

?>

<?= PurchaseFormView::wiget(['model' => $model]) ?>

<?= StateView::widget(['model' => $model]) ?>

<?= NomenclatureView::widget(['purchaseId' => $model->id]) ?>
