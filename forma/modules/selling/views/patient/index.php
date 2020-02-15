<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel forma\modules\selling\records\patient\PatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Пациенты');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Завести карточку'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'surname',
            'years',
            'dateBirth',
            'gender',
            'phone',
            // 'patronymic',
            // 'location',
            // 'diagnosis',
            // 'complaints:ntext',
            // 'allDiseases:ntext',
            // 'developmentOfDisease:ntext',
            // 'surveyData:ntext',
            // 'bite:ntext',
            // 'mouthCondition:ntext',
            // 'x-ray:ntext',
            // 'laboratoryTests:ntext',
            // 'colorVita',
            // 'hygieneЕrainingDate',
            // 'dateHygieneControl',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
