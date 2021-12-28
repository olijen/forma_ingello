<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use forma\extensions\kartik\DynaGrid;
use yii\bootstrap\ButtonDropdown;
use yii\helpers\Url;
use yii\web\View;
/* @var $this yii\web\View */
/* @var $searchModel forma\modules\customer\records\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Клиенты';
$this->params['breadcrumbs'][] = ['label' => 'Люди', 'url' => '/core/default/people'];
$this->registerJsFile('@web/js/plugins/group-operation.plugin.js', ['position' => View::POS_BEGIN]);
$this->registerJsFile('@web/js/common.js', ['position' => View::POS_END]);

$this->title = 'Объекты учета';
$this->params['breadcrumbs'][] = ['label' => 'Объекты', 'url' => '/product'];

$this->registerJsFile('@web/js/dyna-grid-change-icon.js', ['position' => \yii\web\View::POS_BEGIN]);
?>
<div class="customer-index">
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fas fa-user-plus"></i> Создать клиента', ['create'], ['class' => 'btn btn-success forma_green']) ?>
        <?= Html::button('<i class="fas fa-envelope-open-text"></i> Подготовить рассылку', ['id' => 'preSend', 'class' => 'btn btn-success forma_green']) ?>
    </p>



<?php /*Pjax::begin(['enablePushState' => false]); */?>
    <?= Html::beginForm(['customer/send'], 'post', ['data-pjax' => ''])?>
    <div class="row hidden" id="mail-form">
        <div class="container-fluid">
            <div class="col-lg-6">
                <div class="col-md-12" style="padding-bottom: 12px">
                    <?= Html::label('Тема сообщения') ?>
                    <?= Html::input('text', 'messageSubject', '', ['class' => 'form-control']) ?>
                </div>
                <div class="col-md-12" style="padding-bottom: 12px">
                    <?= Html::label('Сообщение') ?>
                    <?= Html::textarea('message', '', ['class' => 'form-control',  'style' => 'height: 100px']) ?>
                </div>

                <div class="col-md-12" style="padding-bottom: 12px">
                    <?= Html::submitButton('Начать рассылку', ['class' => 'btn btn-success', 'submitButton']) ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6"></div>
    </div>
    <div class="row">
        <?php if(Yii::$app->session->hasFlash('SentMessage')): ?>
            <div class="alert alert-success" role="alert">
                <?= Yii::$app->session->getFlash('SentMessage', '', 'Success') ?>
            </div>
        <?php endif; ?>
    </div>
    <?php
    $applyFilterTableCategory = (isset($_GET['CustomerSearch']['category_id']) && is_numeric($_GET['CustomerSearch']['customer_id'])) ?
        [
            'content' => '<button onclick="$(\'#grid-customer\').yiiGridView(\'applyFilter\');" class="btn btn-success forma_light_orange"> <i class="glyphicon glyphicon-search"></i> Поиск по таблице </button>',
        ]
        :
        ['content' => ''];
    ?>
    <?php
    $applyFilterTableCategory = (isset($_GET['CustomerSearch']['customer_id']) && isset($_GET['CustomerSearch'])) ?
        [
            'content' => '<a class="btn btn-success" href="/customer/customer/index">Сбросить фильтры</a>',
        ]
        :
        ['content' => ''];
    ?>
    <div class="product-index">

        <input id="import-file-input" type="file" style="display: none;">
    <?php


    $columns = [
        [
            'class' => 'yii\grid\CheckboxColumn', 'checkboxOptions' => ['name' => 'checkbox[]']
        ],


        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{history} {update} {delete}',
            'buttons' => [
                'history' => function ($url, $model, $key) {
                    return "<a href=\"/selling/main?SellingSearch[customer_id]={$model->id}\" title=\"История\" aria-label=\"История\" data-pjax=\"0\"><span class=\"glyphicon glyphicon-list-alt\"></span></a>";
                }
            ]
        ],

        'firm',
        'name',
        'chief_phone',
        'telegram',
        'skype',
        'whatsapp',
        'viber',
        'address',
        [
            'label'=>'Приоритет',
            'format'=>'text', // Возможные варианты: raw, html
            'content'=>function($data){
                $count = $data->getSellings()->count();
                return $count;
            },
        ],

        [
            'attribute' => 'customer_source_id',
            'value' => 'customerSource.name',
            //'filter' => ActiveRecordHelper::getList(CustomerSource::class),

        ],

        // 'email:email',
        // 'tax_rate',
    ];

    if (isset($fieldsList) && isset($allFieldProductValue)) {
        $params = Yii::$app->request->queryParams;
        foreach ($fieldsList as $fieldId => $field) {

            if (isset($params['FieldProductValue'][$fieldId])) {
                $filter = SystemWidget::gridFilter($fieldId, $field, $params['FieldProductValue'][$fieldId]['null']);
            } else {
                $filter = SystemWidget::gridFilter($fieldId, $field);
            }
            $dataProvider->setSort([
                'attributes' =>
                    ArrayHelper::merge($dataProvider->sort->attributes,
                        [
                            'FieldProductValue' . $fieldId
                            => [
                                'label' => $field->name,
                            ],
                        ]),
            ]);
            $columns [] = [
                'label' => $field->name,
                'attribute' => 'FieldProductValue' . $fieldId,
                'value' => function ($model) use ($field, $allFieldProductValue) {
                    Yii::debug('field');
                    Yii::debug($field);
                    Yii::debug('model');
                    Yii::debug($model);
                    Yii::debug('allFieldProductValue');
                    Yii::debug($allFieldProductValue);
                    foreach ($allFieldProductValue as $fieldProductValue) {
                        if ($fieldProductValue->field_id == $field->id && $fieldProductValue->product_id == $model->id) {
                            if (is_array($fieldProductValue->value)) {
                                $multiSelectFieldProductValues = '';
                                foreach ($fieldProductValue->value as $multiSelectFieldProductValue) {
                                    if (empty($multiSelectFieldProductValues)) {
                                        $multiSelectFieldProductValues = $multiSelectFieldProductValue;
                                    } else {
                                        $multiSelectFieldProductValues .= ', ' . $multiSelectFieldProductValue;
                                    }
                                }
                                return $multiSelectFieldProductValues;
                            }
                            return $fieldProductValue->value;
                        }
                    }
                    return null;
                },
                'filter' => $filter,
            ];
        }
    }
    ?>
    <?= DynaGrid::widget([
        'allowSortSetting' => false,
        'showPersonalize' => true,
        'allowFilterSetting' => false,
        'theme' => 'panel-default',
        'columns' => $columns,
        'options' => ['id' => 'dynagrid-' . $searchModel->tableName()],
        'gridOptions' => [
            'editableMode' => false,
            'displayEmptyValue' => true,
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'responsiveWrap' => false,
            'options' => ['id' => 'grid-' . $searchModel->tableName()],
            'toolbar' => [
                $applyFilterTableCategory,
                [
                    'content' => Html::a('<i class="glyphicon glyphicon-plus"></i> Добавить', ['create'], ['class' => 'btn btn-success forma_light_orange']),
                ],
                [
                    'content' => Html::button('<i class="glyphicon glyphicon-trash"></i> Удалить', [
                        'type' => 'button',
                        'class' => 'btn btn-danger forma_light_orange',
                        'onclick' => '$("#grid-' . $searchModel->tableName() . '")
                        .groupOperation("' . Url::to(['/customer/customer/delete-selection']) . '", {
                            message: "Are you sure you want to delete selected items?"
                        });
                    ',
                    ]),
                ],
                [
                    'content' => ButtonDropdown::widget([
                        'label' => '<i class="glyphicon glyphicon-import"></i>',
                        'encodeLabel' => false,
                        'dropdown' => [
                            'items' => [
                                ['label' => 'Import file', 'options' => [
                                    'onclick' => '$("#import-file-input").trigger("click");',
                                    'style' => 'cursor: pointer;',
                                ]],
                                [
                                    'label' => 'Example of file!',
                                    'options' => [
                                        'onclick' => 'location.href = "/customer/customer/download-example-file"',
                                        'style' => 'cursor: pointer;',
                                    ],
                                ],
                            ],
                        ],
                        'options' => ['class' => 'btn btn-default forma_light_orange'],
                    ]),
                ],
                '{export}',
                '{toggleData}',
                '{dynagrid}',
            ],
        ],
    ]); ?>
    <?php /* $grid = GridView::widget([

        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\CheckboxColumn', 'checkboxOptions' => ['name' => 'checkbox[]']
            ],


            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{history} {update} {delete}',
                'buttons' => [
                    'history' => function ($url, $model, $key) {
                        return "<a href=\"/selling/main?SellingSearch[customer_id]={$model->id}\" title=\"История\" aria-label=\"История\" data-pjax=\"0\"><span class=\"glyphicon glyphicon-list-alt\"></span></a>";
                    }
                ]
            ],

            'firm',
            'name',
            'chief_phone',
            'telegram',
            'skype',
            'whatsapp',
            'viber',
            'address',
            [
                'label'=>'Приоритет',
                'format'=>'text', // Возможные варианты: raw, html
                'content'=>function($data){
                      $count = $data->getSellings()->count();
                      return $count;
                },
            ],

            [
                'attribute' => 'customer_source_id',
                'value' => 'customerSource.name',
                //'filter' => ActiveRecordHelper::getList(CustomerSource::class),

            ],

            // 'email:email',
            // 'tax_rate',
        ],


    ]); ?>

    <?= Html::endForm()?>

<?php /*Pjax::end(); */?>

</div>
<script>
    var flag = false;
    document.getElementById('preSend').onclick = function () {
        if (flag === false) {
            document.getElementById('mail-form').classList.remove('hidden');
            document.getElementById('preSend').innerText = 'Окончить рассылку';
            flag = true;
        } else {
            document.getElementById('mail-form').classList.add('hidden');
            document.getElementById('preSend').innerText = 'Подготовить рассылку';
            flag = false;
        }
    }
</script>
