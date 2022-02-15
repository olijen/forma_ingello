<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \wokster\ltewidgets\BoxWidget;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel forma\modules\template\records\TemplateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Шаблоны';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="template-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '<i class="fas fa-plus"></i> Создать шаблон'), ['create'], ['class' => 'btn btn-success forma_blue']) ?>
    </p>

    <?php Pjax::begin(['id' => 'grid'])?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\ActionColumn','contentOptions' => ['style' => 'width:10%;  min-width:10%;  ']],
            'id',
            'title:ntext',
            'content:ntext',
            'theme:ntext',
            'user:ntext',


        ],
    ]); ?>

    <?php Pjax::end();?>




</div>
