<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \wokster\ltewidgets\BoxWidget;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel forma\modules\hr\records\volunteer\VolunteerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Волонтеры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="volunteer-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '<i class="fas fa-user-plus"></i> Добавить волонтера'), ['create'], ['class' => 'btn btn-success btn-all-screen']) ?>
    </p>

    <?php Pjax::begin(['id' => 'grid']) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}{update}',
            ],
            'id',
            [
                'attribute' => 'status',
                'filter' => $searchModel::getStatuses(),
                'value' => function ($data) {
                    return $data->getStatuses()[$data->status];
                },
            ],
            'full_name',
            'phone',
            [
                'attribute' => 'support_type',
                'filter' => $searchModel::getSupportTypes(),
                'filterInputOptions' => ['multiple' => true, 'class' => 'form-control', 'style' => 'min-width: 150px;'],
                'value' => function ($data) {
                    return $data->getSupportTypes()[$data->support_type];
                },
            ],
            [
                'attribute' => 'comment',
                'format' => 'html'
            ],
            'capacity',
            'options:ntext',
            [
                'attribute' => 'created_at',
                'filter' => \kartik\date\DatePicker::widget([
                    'name' => 'VolunteerSearch[created_at]',
                    'type' => \kartik\date\DatePicker::TYPE_COMPONENT_PREPEND,
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ],
                    'value' => isset($_GET['VolunteerSearch']['created_at']) ?
                        $_GET['VolunteerSearch']['created_at'] : '',
                ]),
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>


</div>
