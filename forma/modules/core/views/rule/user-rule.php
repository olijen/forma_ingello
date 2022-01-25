<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel forma\modules\core\records\AccessInterfaceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>
<div class="selling-index">
    <div class="col-md-12 block">

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

    </div>
</div>



