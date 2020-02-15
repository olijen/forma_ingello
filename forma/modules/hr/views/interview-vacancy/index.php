<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel forma\modules\hr\records\SellingProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Selling Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="selling-product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Selling Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'vacancy_id',
                'value' => 'vacancy.title',
                'filter' => \forma\modules\product\records\Vacancy::getList(),
            ],
            [
                'attribute' => 'pack_unit_id',
                'value' => 'packUnit.name',
                'filter' => \forma\modules\product\records\PackUnit::getList(),
            ],
            [
                'attribute' => 'interview_id',
                'value' => 'interview.name',
                'filter' => \forma\modules\hr\records\interview\Interview::getList(),
            ],
            'quantity',
            'cost',
            'cost_type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
