<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel forma\modules\product\records\CurrencySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Валюты';
$this->params['breadcrumbs'][] = ['label' => 'Объекты', 'url' => '/product'];

?>
<div class="currency-index">

    <p>
        <?= Html::a('Создать валюты', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'code',
            'rate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
