<?php

use forma\modules\selling\records\selling\Selling;
use forma\components\ActiveRecordHelper;
use forma\modules\customer\records\Customer;
use forma\modules\warehouse\records\Warehouse;
use forma\widgets\DateRangeFilter;
use forma\modules\selling\records\state\State;
use kartik\date\DatePicker;
use kartik\dynagrid\DynaGrid;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel \forma\modules\selling\records\selling\SellingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Продажи';
$this->registerJsFile('@web/js/plugins/group-operation.plugin.js', ['position' => View::POS_BEGIN]);
?>
<div class="selling-index">

    <a href="/selling/form/index" class="btn btn-success forma_blue"> <i class="fa fa-plus"></i> Новая продажа</a>
    <a href="/selling/main?SellingSearch[state]=0" class="btn btn-primary forma_blue"><i
                class="fas fa-phone-volume"></i> План на день</a>
    <a href="/selling/main-state/index" class="btn btn-success forma_blue"> <i class="fa fa-dot-circle"></i> Настроить
        состояния</a>

    <hr>

    <?php Pjax::begin(); ?>

    <?php

    $columns = [
        ['class' => 'kartik\grid\CheckboxColumn'],
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
            'label' => 'Телеграм',
            'value' => 'customer.telegram'
        ],
        [
            'attribute' => 'customer_skype',
            'label' => 'Скайп',
            'value' => 'customer.skype'
        ],
        [
            'attribute' => 'customer_whatsapp',
            'label' => 'Вотсап',
            'value' => 'customer.whatsapp'
        ],
        [
            'attribute' => 'customer_viber',
            'label' => 'Вайбер',
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
            'filter' => ArrayHelper::map(State::find()->where(['user_id' => Yii::$app->user->id])->all(), 'id', 'name'),
        ],
        [
            'attribute' => 'event_name',
            'label' => 'Следующий шаг',
            'value' => function ($model) {
        if (empty($model->events) ){
            return null;
        }
        $maxEvent = $model->events[0];

                foreach ($model->events as $event){
                    if ($event->id >
                        $maxEvent->id )
                        $maxEvent = $event;
                }
                return $maxEvent->name;
            }

        ],
    ];

    $columns[] = [
            'attribute' => 'date_from',
            'filter' => DatePicker::widget([
                'name' => 'SellingSearch[date_from]',
                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-mm-yyyy'
                ],
            ]),
        'value' => function($model){
            if (empty($model->events) ){
                return null;
            }
        $maxEvent = $model->events[0];
        foreach($model->events as $event){
            if ($event->id
                > $maxEvent->id)
                $maxEvent=$event;
        }
        return $maxEvent->date_from;

        },
    'label' => 'Дата следующего шага'

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

    $columns[] = [
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
            'options' => ['id' => 'grid-' . $searchModel->tableName()],
            'toolbar' => [
                [
                    'content' => Html::button('<i class="glyphicon glyphicon-trash"></i> Удалить', [
                        'type' => 'button',
                        'class' => 'btn btn-danger forma_light_orange',
                        'onclick' => '$("#grid-' . $searchModel->tableName() . '")
                        .groupOperation("' . Url::to(['/selling/main/delete-selection']) . '", {
                            message: "Are you sure you want to delete selected items?"
                        });
                    ',
                    ]),
                ],
                '{export}',
                '{toggleData}',
                '{dynagrid}',
            ],
        ]
    ]);

    ?>

    <?php Pjax::end(); ?>

</div>

<style>
    tr:hover {
        background-color: #58628e;
    }
</style>