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
use forma\components\widgets\MethodAccess;

//use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel \forma\modules\selling\records\selling\SellingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Продажи';
$this->registerJsFile('@web/js/plugins/group-operation.plugin.js', ['position' => View::POS_BEGIN]);

?>


<div class="selling-index" >
    <a href="/selling/form/index" class="btn btn-success forma_blue"> <i class="fa fa-plus"></i> Новая продажа </a>
    <a href="/selling/main?sort=-lastEventDate" class="btn btn-primary forma_blue"><i
                class="fas fa-phone-volume"></i> План по продажам</a>
    <a href="/selling/main-state/index" class="btn btn-success forma_blue"> <i class="fa fa-dot-circle"></i> Настроить
        состояния</a>
    <a href="selling/super-selling" class="btn btn-success forma_blue"> <i class="fa fa-table"></i> Супер-таблица</a>
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
    ];

    $columns[] = [
        'attribute' => 'date_create',
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

    $columns[] = [
        'attribute' => 'companyName',
        'label' => 'Компания',
        'value' => 'customer.firm',
    ];

    $columns[] = [
        'attribute' => 'lastEventName',
        'label' => 'Следeдующий шаг',
        'value' => 'lastEventName',
    ];

    $columns[] = [
        'attribute' => 'lastEventDate',
        'label' => 'Дата следующего шага',
        'value' => 'lastEventDate',
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

                ['content' =>
                    (isset($_GET['SellingSearch']) || isset($_GET['sort']) )?
                        Html::a('Сбросить фильтры', ['main/index'], ['class' => 'btn btn-success']) : false
                ],
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