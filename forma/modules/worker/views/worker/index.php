<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel forma\modules\worker\records\WorkerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Кадры');
$this->params['homeLink'] = ['label' => 'Панель упраления', 'url' => '/hr', 'title' => 'Панель управления модулем найма'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worker-index">

    <p>
        <?= Html::a(Yii::t('app', 'Новый кадр'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($data){
                    return $data->status ? 'Работает' : 'Свободен';
                }
            ],
            'name',
            'surname',
            //'patronymic',
            'date_birth',
            [
                'attribute' => 'gender',
                'format' => 'raw',
                'value' => function($data){
                    return $data->status ? 'Женщина' : 'Мужчина';
                }
            ],
            'passport',
            //'apply_position',
            //'experience',
            //'experience_description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
