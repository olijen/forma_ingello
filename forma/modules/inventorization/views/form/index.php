<?php

use yii\helpers\Url;
use forma\modules\inventorization\widgets\InventorizationFormView;
use forma\modules\inventorization\widgets\RemainsTableView;
use forma\modules\inventorization\widgets\InventorizationTableView;
use forma\modules\inventorization\records\StateConfirm;

/**
 * @var $model \forma\modules\inventorization\records\Inventorization
 * @var $core \forma\modules\core\Module
 */

$this->title = $model->isNewRecord ? 'Create Inventorization' : $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Inventorizations', 'url' => Url::to(['/inventorization/main'])];


?>

<?= InventorizationFormView::widget(['model' => $model]) ?>

<?php

$core = Yii::$app->getModule('core');
echo $core->getStateWidget(['model' => $model]);

?>

<?= $model->stateIs(new StateConfirm()) ?
    InventorizationTableView::widget(['model' => $model]) : RemainsTableView::widget(['model' => $model]) ?>
