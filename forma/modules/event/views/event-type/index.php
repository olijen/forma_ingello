<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use \wokster\ltewidgets\BoxWidget;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel forma\modules\event\records\EventTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ТипыСобытий';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-type-index">

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?php BoxWidget::begin([
        'title'=>'ТипСобытия <small class="m-l-sm">записей '.$dataProvider->getCount().' из '.$dataProvider->getTotalCount().'</small>',
        'buttons' => [
            ['link', '<i class="fa fa-plus-circle" aria-hidden="true"></i>',['create'],['title'=>'создать ТипСобытия']]
        ]
    ]);
    ?>

    <?php Pjax::begin(['id' => 'grid'])?>    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model->name), ['view', 'id' => $model->id]);
        },
    ]) ?>

    <?php Pjax::end();?>

    <?php BoxWidget::end();?>


</div>
