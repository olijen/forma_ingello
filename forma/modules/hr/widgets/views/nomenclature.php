<?php

use forma\modules\hr\records\interview\StateDone;
use forma\modules\hr\records\interviewvacancy\InterviewVacancy;
use yii\bootstrap\Html;
use yii\data\ActiveDataProvider;
use yii\widgets\Pjax;
use yii\helpers\Url;
use forma\extensions\editable\GridView;
use forma\extensions\editable\DataColumn;
use yii\widgets\ActiveForm;
use forma\modules\core\widgets\AutoComplete;
use forma\modules\hr\records\interview\StateConfirm;
use forma\modules\core\widgets\DetachedBlock;
use forma\modules\product\records\Currency;
use forma\modules\hr\widgets\TotalSumView;

/**
 * @var InterviewVacancy $unit
 * @var ActiveDataProvider $dataProvider
 * @var float $sumTotal
 */

?>

<?php Pjax::begin([
    'id' => 'interview-nomenclature-pjax',
    'enablePushState' => false,
    'enableReplaceState' => false,
]) ?>

<?php DetachedBlock::begin([
    'example' => 'Товар',
]); ?>

<div class="operation-nomenclature" data-warehouse-id="<?= $unit->interview->project_id ?>">

<?php if (!$unit->interview->stateIs(new StateDone())): ?>
<div class="row">

    <?php $form = ActiveForm::begin([
        'action' =>  Url::to(['/hr/nomenclature/add-position']),
        'validationUrl' => Url::to(['/hr/nomenclature/validate']),
        'options' => ['data-pjax' => '1'],
    ]); ?>

    <?= $form->field($unit, 'interview_id')->hiddenInput()->label(false) ?>

    <div class="col-md-3">
        <?= $form->field($unit, 'vacancy_id')->widget(AutoComplete::className(), [
            'url' => Url::to([
                '/warehouse/warehouse-product/search-for-interview',
                'interviewId' => $unit->interview_id,
            ]),
        ]) ?>
    </div>
    <div class="col-md-1">
        <?= Html::submitButton('<i class="glyphicon glyphicon-plus"></i>', [
            'class' => 'btn btn-success form-control',
            'style' => 'margin-top: 25px;',
        ]) ?>
    </div>
<?php ActiveForm::end(); ?>
</div>
<?php endif; ?>

<div class="row">
    <div class="col-md-12">
    <?php

    $columns = [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'vacancy.title',
            'isEditable' => false,
            'label' => 'Товар',
        ],
//        [
//            'class' => 'yii\grid\ActionColumn',
//            'template' => '{delete}',
//            'contentOptions' => ['class' => 'action-column'],
//            'buttons' => [
//                'delete' => function ($url, $model, $key) {
//                    return Html::a('<span class="glyphicon glyphicon-trash"></span>',
//                        '/interview/nomenclature/delete-position?id='.$model->id, [
//                            'title' => Yii::t('yii', 'Delete'),
//                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
//                            'data-method' => 'post',
//                            'data-pjax' => '1',
//                        ]);
//                },
//            ],
//        ],
    ];

    $gridIsEditable = !$unit->interview->stateIs(new StateDone());

    echo GridView::widget([
        'id' => 'interview-nomenclature-grid',
        'isEditable' => $gridIsEditable,
        'updateUrl' => Url::to(['/interview/nomenclature/editCell']),
        'pjaxContainer' => 'interview-nomenclature-pjax',
        'dataProvider' => $dataProvider,
        'columns' => $columns,
        'responsiveWrap' => false,
    ]);

    ?>
    </div>
</div>

<?php DetachedBlock::end(); ?>

<?php DetachedBlock::begin([
    'example' => 'Итого',
]); ?>
    

<?php DetachedBlock::end(); ?>

</div>

<?php Pjax::end(); ?>
