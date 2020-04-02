<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\patient\Patient */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patients'), 'url' => ['index']];
?>
<div class="patient-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nameCompany',
            'address',
            'years',
            'name',
            'surname',
            'patronymic',
            'gender',
            'dateBirth',
            'location',
            'phone',
            'diagnosis',
            'complaints:ntext',
            'allDiseases:ntext',
            'developmentOfDisease:ntext',
            'surveyData:ntext',
            'bite:ntext',
            'mouthCondition:ntext',
            'xray:ntext',
            'laboratoryTests:ntext',
            'colorVita',
            'hygieneЕrainingDate',
            'dateHygieneControl',
        ],
    ]) ?>

</div>
