<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel forma\modules\core\records\ItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Пункты');

?>
<div class="item-index">

    <p>
        <?= Html::a(Yii::t('app', 'Добавить пункт'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            'title',
            'description',
//            'parent_id',
            'regularity_id',
            //'order',
            //'color',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => ' {update} {delete} ',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
