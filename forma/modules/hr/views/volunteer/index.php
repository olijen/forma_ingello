<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel forma\modules\hr\records\volunteer\VolunteerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = isset($_GET['how_many']) ? 'Рекомендуемые волонтеры' : 'Волонтеры';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .booking {
        width: 42px;
        height: 42px;
        font-size: 20px;
    }
</style>

<div class="volunteer-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '<i class="fas fa-list"></i> Все волонтёры'), ['index'], ['class' => 'btn btn-success btn-all-screen']) ?>
        <?= Html::a(Yii::t('app', '<i class="fas fa-user-plus"></i> Добавить волонтера'), ['create'], ['class' => 'btn btn-success btn-all-screen']) ?>
        <?= Html::a(Yii::t('app', '<i class="fas fa-list"></i> Список переселенцев'), '/hr/victim', ['class' => 'btn btn-success btn-all-screen']) ?>
        <?= Html::a(Yii::t('app', '<i class="fas fa-user-plus"></i> Добавить переселенцев'), '/hr/victim/create', ['class' => 'btn btn-success btn-all-screen']) ?>
    </p>

    <?php Pjax::begin(['id' => 'grid']) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}{update}{booking}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, ['hidden' => 'hidden', 'title' => 'Редактировать']);
                    },
                    'booking' => function ($url, $model) {
                        if (isset($_GET['how_many'])) {
                            $how_many = Yii::$app->request->get('how_many');
                            return "<button onclick=addBooking($model->id,$how_many) class='booking btn btn-success' type='button'><i class='fa fa-bookmark fa-xl'></i></button>";
                        }
                    }
                ],
            ],
            'id',
            [
                'attribute' => 'status',
                'filter' => $searchModel::getStatuses(),
                'value' => function ($data) {
                    return $data::getStatuses()[$data->status];
                },
            ],
            'full_name',
            'phone',
            [
                'attribute' => 'support_type',
                'filter' => $searchModel::getSupportTypes(),
                'filterInputOptions' => ['multiple' => false, 'class' => 'form-control', 'style' => 'min-width: 150px;'],
                'value' => function ($data) {
                    if ($data->support_type != null) {
                        return $data::getSupportTypes()[$data->support_type];
                    } else {
                        return null;
                    }
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
<script>
    function addBooking(id, how_many) {
        let x = confirm("Вы хотите списать " + how_many + " мест в данном месте размещения. Подтвердить ?");
        let volunteerId = id;
        let howMany = how_many;

        if (x) {
            $.ajax({
                type: "POST",
                url: "/hr/volunteer/booking?id=" + volunteerId,
                data: {volunteerId: volunteerId, howMany: howMany}
            }).done(function (msg) {
            });
        } else {

        }
    }
</script>
