<?php

use forma\extensions\kartik\DynaGrid;
use yii\data\ActiveDataProvider;
use forma\modules\hr\records\interviewstate\InterviewState;
use forma\modules\project\records\project\Project;
use forma\modules\vacancy\records\Vacancy;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
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

    <a href="/hr/form/index" class="btn btn-success forma_pink"><i class="fas fa-user-plus"></i> Начать найм</a>
    <a href="/hr/main?InterviewSearch[state]=0" class="btn btn-primary forma_pink"> <i class="fas fa-phone-volume"></i> План на обзвон</a>

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
            'attribute' => 'state_id',
            'value' => 'interviewState.name',
            'filter' => ArrayHelper::map(InterviewState::find()->where(['user_id'=> Yii::$app->user->id])->orderBy('order')->all(),'id', 'name'),
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


