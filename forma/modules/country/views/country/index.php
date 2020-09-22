<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel forma\modules\country\records\CountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Страны';
$this->params['breadcrumbs'][] = ['label' => 'Объекты', 'url' => '/product'];

?>
<div class="country-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
