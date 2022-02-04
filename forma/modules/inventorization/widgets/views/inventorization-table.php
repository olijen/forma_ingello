<?php

use forma\modules\core\widgets\DetachedBlock;
use yii\widgets\Pjax;
use forma\extensions\editable\GridView;
use yii\helpers\Url;

/**
 * @var $dataProvider \yii\data\ActiveDataProvider
 */

Pjax::begin([
    'id' => 'inventorization-table-pjax',
    'enablePushState' => false,
    'enableReplaceState' => false,
]);

?>

<?php DetachedBlock::begin(['header' => 'Изменения']); ?>

<?php

$columns = [
    ['class' => 'yii\grid\SerialColumn'],
    [
        'attribute' => 'product.name'
    ],
    [
        'attribute' => 'accounting_quantity',
        'label' => 'Учетное к-во',
    ],
    [
        'attribute' => 'fact_quantity',
        'label' => 'Фактическое к-во',
    ],
];

echo GridView::widget([
    'editableMode' => false,
    'columns' => $columns,
    'dataProvider' => $dataProvider,
    'responsive' => false
]);

?>

<?php DetachedBlock::end(); ?>

<?php Pjax::end(); ?>
