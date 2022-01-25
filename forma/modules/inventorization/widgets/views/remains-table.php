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

<?php DetachedBlock::begin(['header' => 'Остатки']); ?>

<?php

$columns = [
    ['class' => 'yii\grid\SerialColumn'],
    [
        'label' => 'Товар',
        'value' => function(\forma\modules\warehouse\records\WarehouseProduct $obj) {
            return $obj->product->name;
        },
    ],
    [
        'attribute' => 'quantity',
        'label' => 'Учетное к-во',
    ],
    [
        'name' => 'factQty',
        'label' => 'Фактическое к-во',
        'isEditable' => true,
    ],
];

echo GridView::widget([
    'tableKey' => 'remainsTable',
    'isEditable' => false,
    'useLocalStorage' => true,
    'responsive' => false,
    'columns' => $columns,
    'dataProvider' => $dataProvider,
    'updateUrl' => Url::to(['/inventorization/state/confirm', 'id' => $model->id]),
]);

?>

<?php DetachedBlock::end(); ?>

<?php Pjax::end(); ?>
