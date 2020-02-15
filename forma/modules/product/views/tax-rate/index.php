<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel forma\modules\product\records\TaxRateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Налоги';
$this->params['breadcrumbs'][] = ['label' => 'Объекты', 'url' => '/product'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tax-rate-index">
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать налоговую ставку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'percent',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
