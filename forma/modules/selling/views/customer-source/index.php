<?php

use yii\helpers\Html;
use yii\grid\GridView;
use forma\extensions\kartik\DynaGrid;
use \wokster\ltewidgets\BoxWidget;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel forma\modules\selling\records\customersource\CustomerSourceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Источники клиентов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-source-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '<i class="fas fa-plus"></i> Создать состояние'), ['create'], ['class' => 'btn btn-success forma_blue']) ?>
    </p>
    <?php Pjax::begin(['id' => 'grid'])?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\ActionColumn'],


            'id',
            'name',
            'order',
            'description',


        ],
    ]); ?>

    <?php Pjax::end();?>



</div>
