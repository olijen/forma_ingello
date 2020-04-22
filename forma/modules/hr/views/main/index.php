<?php

use forma\extensions\kartik\DynaGrid;
use forma\modules\project\records\project\Project;
use forma\modules\vacancy\records\Vacancy;
use yii\bootstrap\Html;
use yii\widgets\Pjax;
use forma\modules\hr\records\interview\Interview;
use forma\components\ActiveRecordHelper;
use forma\widgets\DateRangeFilter;

/* @var $this yii\web\View */
/* @var $searchModel \forma\modules\hr\records\interview\InterviewSearch
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Найм';
$this->params['homeLink'] = ['label' => 'Панель упраления', 'url' => '/hr', 'title' => 'Панель управления модулем найма'];

?>
<div class="selling-index">

    <a href="/hr/form/index" class="btn btn-success">Начать найм</a>
    <a href="/hr/main?InterviewSearch[state]=0" class="btn btn-primary">План на обзвон</a>

    <hr>

<?php Pjax::begin(); ?>

    <?php

    $columns = [
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
        ],
        [
            'attribute' => 'worker_id',
            'value' => 'worker.fullName',
            'filter' => Html::input('text', 'InterviewSearch[worker_name]', '',['class' => 'form-control']),
        ],
        [
            'attribute' => 'project_id',
            'value' => 'project.name',
            'filter' => ActiveRecordHelper::getList(Project::class),
        ],
        [
            'attribute' => 'vacancy_id',
            'value' => 'vacancy.name',
            'filter' => ActiveRecordHelper::getList(Vacancy::class),
        ],
        [
            'attribute' => 'state',
            'value' => function (Interview $interview) { return $interview->getState()->getName(); },
            'filter' => Interview::getStatesList(),
        ],
    ];


    echo DynaGrid::widget([
        'options' => ['id'  => 'dyna-grid-' . $searchModel->tableName()],
        'theme' => 'panel-default',
        'columns' => $columns,

        'gridOptions' => [
            'editableMode' => false,
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'responsiveWrap' => false,
        ],
    ]);

    ?>

<?php Pjax::end(); ?>

</div>

<style>
    tr:hover {
       background-color: #8dcb96 !important;
    }
</style>
