<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel forma\modules\product\records\PackUnitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Упаковки';
$this->params['breadcrumbs'][] = ['label' => 'Объекты', 'url' => '/product'];

?>
<div class="pack-unit-index">
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fa fa-plus"></i> Создать упаковку', ['create'], ['class' => 'btn btn-success forma_light_orange']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'bottles_quantity',
            'volume',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
