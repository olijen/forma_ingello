<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel forma\modules\supplier\records\SupplierSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Поставщики';
$this->params['breadcrumbs'][] = ['label' => 'Люди', 'url' => '/core/default/people'];

?>
<div class="supplier-index">
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<?php Pjax::begin(); ?>
    <p>
        <?= Html::a('Создать поставщика', ['create'], ['class' => 'btn btn-success btn-all-screen']) ?>
    </p>
    <?php if (isset($_GET['SupplierSearch'])): ?>
        <p>
            <?= Html::a('Сбросить фильтры', ['supplier/index'], ['class' => 'btn btn-success btn-all-screen']); ?>
        </p>
    <?php endif; ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'firm',
            'contact_name',
            [
                'attribute' => 'country_id',
                'value' => 'country.name',
                'filter' => \forma\modules\country\records\Country::getList(),
            ],
            // 'address',
            // 'email:email',
            'tax_rate',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
