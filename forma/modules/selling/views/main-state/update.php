<?php


use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\state\State */

$this->title = Yii::t('app', 'Update State: {name}', [
    'name' => $model->name,
]);

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'States'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>

<div class="state-update">

    <div class="state-to-state-index">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'state_id',
                'to_state_id',
                'toState.name',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
        ?>

        <p>
            <?= Html::a(Yii::t('app', 'Create State To State'), ['state-to-state/create'], ['class' => 'btn btn-success']) ?>
        </p>

    </div>

</div>
