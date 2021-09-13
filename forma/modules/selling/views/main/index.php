<?php

use kartik\dynagrid\DynaGrid;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use forma\modules\selling\records\selling\Selling;
use forma\components\ActiveRecordHelper;
use forma\modules\customer\records\Customer;
use forma\modules\warehouse\records\Warehouse;
use forma\widgets\DateRangeFilter;
use forma\modules\selling\records\state\State;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel \forma\modules\selling\records\selling\SellingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Продажи';

?>
<div class="selling-index">

    <a href="/selling/form/index" class="btn btn-success forma_blue"> <i class="fa fa-plus"></i> Новая продажа</a>
    <a href="/selling/main?SellingSearch[state]=0" class="btn btn-primary forma_blue"><i class="fas fa-phone-volume"></i> План на обзвон</a>
    <a href="/selling/main-state/index" class="btn btn-success forma_blue"> <i class="fa fa-dot-circle"></i> Настроить состояния</a>

    <hr>

<?php Pjax::begin(); ?>

    <?php

    $columns = [
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
        ],
        [
            'attribute' => 'customerName',
            'label' => 'Клиент',
            'value' => 'customer.name',
        ],

        [
            'attribute' => 'customer_chief_phone',
            'label' => 'Телефонный номер клиента',
            'value' => 'customer.chief_phone'
        ],
        [
            'attribute' => 'customer_telegram',
            'label' => 'телеграм',
            'value' => 'customer.telegram'
        ],
        [
            'attribute' => 'customer_skype',
            'label' => 'скайп',
            'value' => 'customer.skype'
        ],
        [
            'attribute' => 'customer_whatsapp',
            'label' => 'вотсап',
            'value' => 'customer.whatsapp'
        ],
        [
            'attribute' => 'customer_viber',
            'label' => 'вайбер',
            'value' => 'customer.viber'
        ],
        [
            'attribute' => 'warehouse_id',
            'value' => 'warehouse.name',
            'filter' => ActiveRecordHelper::getListByQuery(
                    (new \forma\modules\warehouse\records\WarehouseSearch())
                        ->search(Yii::$app->request->queryParams)
                        ->query,
                    'name'
            ),
        ],
        [
            'attribute' => 'state_id',
            'value' => 'toState.name',
            'filter' => ArrayHelper::map(State::find()->where(['user_id'=> Yii::$app->user->id])->all(),'id', 'name'),
        ],

    ];
    foreach (['date_create'] as $attribute) {
        $columns[] = [
            'attribute' => $attribute,
            'filter' => DatePicker::widget([
                'name' => 'SellingSearch[date_create]',
                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ],
                'value' => isset($_GET['SellingSearch']['date_create']) ?
                    $_GET['SellingSearch']['date_create'] : '',
            ]),
        ];
    }

    $columns[] =[
        'attribute' => 'companyName',
        'label' => 'Компания',
        'value' => 'customer.firm',
    ];

    echo DynaGrid::widget([
        'options' => ['id' => 'dyna-grid-' . $searchModel->tableName()],
        'theme' => 'panel-default',
        'columns' => $columns,
        'gridOptions' => [
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'responsiveWrap' => false,
        ],
    ]);

    ?>

<?php  Pjax::end(); ?>

</div>

<style>
    tr:hover {
       background-color: #58628e ;
    }
</style>
