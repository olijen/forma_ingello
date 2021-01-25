<?php

use forma\modules\hr\records\interview\StateWork;
use forma\modules\project\records\project\Project;
use forma\modules\project\records\project\ProjectSearch;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel forma\modules\project\records\project\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Проекты');

$this->params['homeLink'] = ['label' => 'Панель упраления', 'url' => '/hr', 'title' => 'Панель управления модулем найма'];

$this->params['panel'] = Html::a(Yii::t('app', '<i class="fa fa-plus"></i> Создать проект'), ['create'], ['class' => 'btn btn-success forma_pink']);
$this->params['panel'] .= $this->render('_search', ['model' => $searchModel]);

$this->params['panel'] .= ' '. Html::a(Yii::t('app', 'Все'), ['/project/project'], ['class' => ' forma_pink btn btn-'.(empty($_REQUEST['ProjectSearch']['state'])?'primary':'default')]);
$this->params['panel'] .= ' '. Html::a(Yii::t('app', 'В работе'), ['/project/project?ProjectSearch[state]=1'], ['class' => ' forma_pink btn btn-'.(@$_REQUEST['ProjectSearch']['state']==1?'primary':'default')]);
$this->params['panel'] .= ' '. Html::a(Yii::t('app', 'Архив'), ['/project/project?ProjectSearch[state]=2'], ['class' => ' forma_pink btn btn-'.(@$_REQUEST['ProjectSearch']['state']==2?'primary':'default')]);

Pjax::begin();
?>
<div class="project-index">

    <div class="row" style=" max-height: 500px; ">
        <?php
        //$dp = Project::accessSearch(null, ['setPageSize' => 15]);
        $models = $dataProvider->getModels();
        if(empty($models)) echo "<h3>У вас нет ни одного проекта!</h3>";
        foreach($models as $project) : $vacaVaca = $project->projectVacancies?>
            <div class="col-md-4" style="padding-right: 5px;  padding-left: 3px; margin-right: 0;">

                <div class="box box-success" style="padding: 7px; margin-bottom: 7px;min-height: 85px;">
                    <div>
                        <strong>
                            <a data-pjax="0" style="color: #333;" href="/project/project/view?id=<?=$project->id?>"><?=$project->name?></a>
                        </strong>
                    </div>

                    <a
                            class="no-loader"
                        href="/project/project/delete?id=<?=$project->id?>"
                        style=" float: right; padding-left: 5px; color: red;"
                        title="Удалить проект"
                        aria-label="Удалить проект"
                        data-confirm="Вы уверены, что хотите удалить этот элемент?"
                        data-method="post">
                        <span class="glyphicon glyphicon-trash"></span></a>
                    <a data-pjax="0"
                       href="/project/project/update?id=<?=$project->id?>"
                       style="float: right; solid black; padding-left: 5px"
                       title="Редактировать проект"
                       aria-label="Редактировать проект">
                        <span class="glyphicon glyphicon-pencil"></span></a>
                    <a data-pjax="0"
                       href="/project/project/view?id=<?=$project->id?>"
                       title="Смотреть проект"
                       aria-label="Смотреть проект"
                       style="float: right; padding-left: 5px">
                        <span class="glyphicon glyphicon-eye-open"></span></a>
                    <?php if ($project->state == 2) : ?>
                        <a class="no-loader" href="/project/project/change-state?id=<?=$project->id?>&state=1&ProjectSearch[state]=<?=$_REQUEST['ProjectSearch']['state']??''?>" title="Открыть проект" aria-label="Открыть проект" style="float: right; padding-left: 5px; color: orange;"><span class="glyphicon glyphicon-ok-circle"></span></a>
                    <?php else : ?>
                        <a data-pjax="0"
                           href="/project/project-vacancy/create?id=<?=$project->id?>"
                           title="Добавить вакансию на проект" aria-label="Добавить вакансию на проект" style="float: right; padding-left: 5px"><span class="glyphicon glyphicon-plus"></span></a>
                        <a
                                class="no-loader"
                           href="/project/project/change-state?id=<?=$project->id?>&state=2&ProjectSearch[state]=<?=$_REQUEST['ProjectSearch']['state']??''?>"
                           title="Закрыть проект" aria-label="Закрыть проект" style="float: right; padding-left: 5px; color: green;"><span class="glyphicon glyphicon-check"></span></a>
                    <?php endif ?>

                    <?php
                    $count = 0;
                    foreach ($project->interviews as $interview) {
                        if ($interview->stateIs(StateWork::class)) $count++;
                    }
                    $countInt = 0;
                    foreach ($project->interviews as $interview) {
                        if ($interview->state < 4) $countInt++;
                    }
                    $vacacount = 0;
                    foreach ($vacaVaca as $projectVacancy) {
                        $vacacount += $projectVacancy->count;
                    }
                    ?>

                    <span>
                        <small><a data-pjax="0" href="/hr/main?InterviewSearch[state]=4&InterviewSearch[project_id]=<?=$project->id?>">Работают:</a> <?=$count?></small>
                    </span>
                    <span>
                        <small><a data-pjax="0" href="/hr/main?InterviewSearch[state_min]=4&InterviewSearch[project_id]=<?=$project->id?>">Найм:</a> <?=$countInt?></small>
                    </span>
                    <span>
                        <small><a data-pjax="0" href="/project/project-vacancy?ProjectVacancySearch[project_id]=<?=$project->id?>">Вакансий:</a> <?=$vacacount?></small>
                    </span>

                    <div class="btn-group" style="width: 100%;">

                        <?php if ($vacacount == 0) : ?>
                            <a data-pjax="0"
                               href="/project/project-vacancy/create?id=<?=$project->id?>"
                               class="btn btn-block btn-default"
                               title="Добавить вакансию на проект"
                               aria-label="Добавить вакансию на проект"
                               style="color: white">
                                <i class="fa fa-plus"></i> Добавить вакансию на проект</a>
                        <?php else : ?>

                        <button type="button" class="btn btn-block btn-success dropdown-toggle forma_pink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-list"></i> Выбрать вакансии для найма
                        </button>

                        <div style="width: 110%;" class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <?php foreach($vacaVaca as $projectVacancy) : ?>

                                <a style="display: block; padding: 4px; border-bottom: 1px dotted gray;"
                                   class="dropdown-item"
                                   href="/hr/form/index/?projectId=<?=$project->id?>&vacancyId=<?=$projectVacancy->vacancy_id?>">
                                    (<?=$projectVacancy->count?>) <?=$projectVacancy->vacancy->name?>
                                </a>

                            <?php endforeach; ?>
                        </div>
                        <?php endif ?>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>

        <?php
        echo $dataProvider->pagination ? LinkPager::widget([
            'pagination' => $dataProvider->pagination,
        ]) : '';
        ?>
        <script>
            $("select").val("count");
        </script>
    </div>

</div>

<?php Pjax::end(); ?>
