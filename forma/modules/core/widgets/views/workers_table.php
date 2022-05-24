<?php use forma\components\ActiveRecordHelper;
use forma\modules\hr\records\interview\Interview;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

 ?>
<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?= GridView::widget([
    'dataProvider' => $dataProviderWorkers,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'class' => 'yii\grid\ActionColumn',
            'buttons' => [
                'details' => function ($url = '/hr/main/update?id=', $model, $key) {
                    return Html::a('<span class="fa fa-eye"></span>', '/hr/main/update?id='.$model->id, [
                        'title' => 'Full Details',
                        'data-pjax' => '0',
                    ]);
                },
            ],
            'template' => '{details}'
        ],
        ['attribute' => 'Кадр','value' => 'worker.fullName'],

        [
            'attribute' => 'Состояние',
            'value' => function (Interview $interview) {
                 $interviewState = $interview->getInterviewState()->one();
                 if ($interviewState !== null) {
                      return $interviewState->name;
                 }
                 if ($interviewState == null) {
                      return null;
                 }
             }
        ],

    ],
]); ?>