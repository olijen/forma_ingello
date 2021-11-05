<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel forma\modules\core\records\AccessInterfaceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Интерфейсы доступа';
$this->params['breadcrumbs'][] = ['label' => 'Интерфейсы доступа', 'url' => '/core/access-interface'];
?>
<div class="access-interface-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= Html::a('<i class="fas fa-user-plus"></i> Создать интерфейс доступа', ['create'], ['class' => 'btn btn-success forma_green','style'=>'margin:10px;']) ?>

    <?php Pjax::begin(['id' => 'grid'])?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
            ],
            'current_mark',
            [
                'attribute' => 'rule_name',
                'value' => 'rule.rule_name',
                'label' => 'Правило',
            ],
            [
                'attribute' => 'user',
                'value' => 'user.email',
                'label' => 'Пользователь',
            ],
            [
                'attribute' => 'status',
                'value' => function($searchModel){
                  return (($searchModel->status==1)?"Выполнил":"Не выполнил");
                },
                'label' => 'Статус',
                'filter' => Html::activeDropDownList($searchModel, 'status',
                    ['1'=>'Выполнил','0'=>'Не выполнил'],
                    ['placeholder' => 'Выбрать таблицу...','class' => 'form-control','prompt' =>'']),
            ],


        ],
    ]); ?>

    <?php Pjax::end();?>


</div>
