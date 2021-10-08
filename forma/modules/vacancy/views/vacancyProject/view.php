<?php

use forma\extensions\tabsx\TabsX;
use forma\modules\core\widgets\DetachedBlock;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $project \forma\modules\project\records\project\Project*/
/* @var $model forma\modules\vacancy\records\Vacancy */
/* @var $interviewStateWorkerItems \forma\modules\hr\records\interviewstate\InterviewState */

$this->title = $model->name;
$this->params['homeLink'] = ['label' => 'Панель упраления', 'url' => '/hr', 'title' => 'Панель управления модулем найма'];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Вакансии'), 'url' => ['index']];

\yii\web\YiiAsset::register($this);
?>
<div class="vacancy-view">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'rate',
            [
                'attribute' => 'description',
                'format' => 'html',
                'value' => function($data){
                    return $data->description;
                }
            ],
            [
                'attribute' => 'project_id',
                'value' => function() use ($project) {
                    return $project->id;
                }
            ],
            [
                'attribute' => 'name',
                'value' => function() use ($project) {
                    return $project->name;
                }
            ],
            [
                'attribute' => 'адрес',
                'value' => function() use ($project) {
                    return $project->address;
                }
            ],
            [
                'attribute' => 'description',
                'format' => 'html',
                'value' => function() use ($project) {
                    return $project->description;
                }
            ],
        ],
    ]) ?>
</div>
