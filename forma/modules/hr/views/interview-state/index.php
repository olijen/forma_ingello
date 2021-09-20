<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \wokster\ltewidgets\BoxWidget;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel forma\modules\hr\records\interviewstate\InterviewStateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Состояния';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interview-state-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a(Yii::t('app', '<i class="fas fa-plus"></i> Создать состояние'), ['create'], ['class' => 'btn btn-success forma_blue']) ?>
    </p>
    <?php BoxWidget::begin([
        'title'=>'Состояния <small class="m-l-sm">записей '.$dataProvider->getCount().' из '.$dataProvider->getTotalCount().'</small>',
        ]);
    ?>

    <?php Pjax::begin(['id' => 'grid'])?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\ActionColumn'],
            ['attribute' => 'name', 'label' => 'Состояния'],
            'order',
        ],
    ]); ?>

    <?php Pjax::end();?>

    <?php BoxWidget::end();?>


</div>
