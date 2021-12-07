<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use \wokster\ltewidgets\BoxWidget;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel forma\modules\selling\records\sellinghistory\SellingHistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Истории продаж';
$this->params['breadcrumbs'][] = $this->title;
$salesProgress = new \forma\modules\selling\forms\SalesProgress();
$labels = $salesProgress->getLabelsString();
$data = $salesProgress->getDataString();
$backgroundColor = $salesProgress->getColorsString();
$comaList = $salesProgress->getComaListOfSales();

?>
<div class="selling-history-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?php BoxWidget::begin([
        'title'=>'История изменений состояния продаж<small class="m-l-sm">записей '.$dataProvider->getCount().' из '.$dataProvider->getTotalCount().'</small>',
        'buttons' => [
            ['link', '<i class="fa fa-plus-circle" aria-hidden="true"></i>',['create'],['title'=>'создать Историю продаж']]
        ]
    ]);
    ?>

    <?php Pjax::begin(['id' => 'grid'])?>
    
    <?= GridView::widget([

        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [

                'attribute' => 'date',
                'format' => ['date', 'dd.MM.yyyy'],
                'filter' => \kartik\daterange\DateRangePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'date',
                    'convertFormat' => true,
                    'pluginOptions' => [
                        'locale' => [
                            'format' => 'd.m.y'
                        ],
                        'opens' => 'left',
                    ],
                ]) ,
            ],
            'count',
        ],
    ]);; ?>

    <?php Pjax::end();?>

    <?php BoxWidget::end();?>
    <div>
    <?=
    Html::a('Просмотреть график', ['/selling/default'], ['class'=>'btn btn-primary'])
    ?>
    </div>


</div>