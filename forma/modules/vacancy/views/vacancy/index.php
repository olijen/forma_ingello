<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel forma\modules\vacancy\records\VacancySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Вакансии');
$this->params['homeLink'] = ['label' => 'Панель упраления', 'url' => '/hr', 'title' => 'Панель управления модулем найма'];

?>
<div class="vacancy-index">

    <p>
        <?= Html::a(Yii::t('app', '<i class="fas fa-plus"></i> Создать вакансию'), ['create'], ['class' => 'btn btn-success forma_pink']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\ActionColumn','contentOptions' => ['style' => 'width:10%;  min-width:10%;  ']],
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'rate',
            [
                'attribute' => 'description',
                'format' => 'html',
                'value' => function($data){
                    return  $data->description;
                }
            ],


        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
