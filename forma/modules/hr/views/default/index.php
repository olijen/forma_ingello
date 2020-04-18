<?php

use forma\modules\hr\records\interview\StateWork;
use forma\modules\project\records\project\Project;
use forma\modules\project\records\project\ProjectSearch;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;

$this->title = 'Проекты и найм';
$this->params['doc-page'] = 'hr';

$panel = '';
$startUrl = '';
$list = [
    ['label' => 'Старт', 'url' => &$startUrl, 'icon' => 'play', 'class' => 'btn btn-primary btn-lg btn-fix'],
    ['label' => 'Найм', 'url' => '/hr/main', 'icon' => 'volume-up', 'class' =>'btn btn-hr'],
    ['label' => 'Кадры', 'url' => '/worker/worker', 'icon' => 'user'],
    ['label' => 'Вакансии', 'url' => '/vacancy/vacancy', 'icon' => 'id-card', 'class' =>'btn btn-hr'],
    ['label' => 'Проекты', 'url' => '/project/project', 'icon' => 'newspaper-o', 'class' =>'btn btn-hr'],
];

?>

<?php

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
/** @var forma\modules\hr\forms\InterviewProgress $interviewProgress */
$interviewProgress = new \forma\modules\hr\forms\InterviewProgress();
?>

<div class="row">

    <div class="col-lg-9 col-xs-12">

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title" id="scroll">Этапы (воронка найма)</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-minus"></i>
                    </button>
                </div>
            </div>

            <div class="box-body">
                <div class="chart">
                    <canvas id="plan" style=""></canvas>
                </div>
            </div>
        </div>
    </div>

    <?php Pjax::begin(); ?>

    <div class="col-lg-3 col-xs-12" style="padding-right: 0; padding-left: 0; overflow: scroll; min-height: 500px; max-height: 500px;">
        <?php
        $dp = Project::accessSearch(['state' => 1], ['setPageSize' => 6]);
        foreach($dp->getModels() as $project) : $vacaVaca = $project->projectVacancies?>
            <div class="col-md-12" style="padding-right: 0; padding-left: 3px; margin-right: 0;">

                <div class="box box-success" style="padding: 5px; min-height: 85px">
                    <strong>
                        <a data-pjax="0" style="color: #333;" href="/project/project/view?id=<?=$project->id?>"><?=$project->name?></a>
                    </strong>
                    <br>
                    <a data-pjax="0"
                       href="/project/project/delete?id=<?=$project->id?>"
                       style=" float: right; padding-left: 5px; color: red;"
                       title="Удалить проект"
                       aria-label="Удалить проект"
                       data-confirm="Вы уверены, что хотите удалить этот элемент?"
                       data-method="post">
                        <span class="glyphicon glyphicon-trash"></span></a>
                    <a data-pjax="0"
                       href="/project/project/update?id=<?=$project->id?>"
                       style="float: right; solid black;
                       padding-left: 5px"
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
                        <a data-pjax="0"
                           href="/project/project/change-state?id=<?=$project->id?>&state=1&ProjectSearch[state]=<?=$_REQUEST['ProjectSearch']['state']??''?>"
                           title="Открыть проект"
                           aria-label="Закрыть проект"
                           style="float: right; padding-left: 5px; color: orange;">
                            <span class="glyphicon glyphicon-ok-circle"></span></a>
                    <?php else : ?>
                        <a data-pjax="0"
                            href="/project/project-vacancy/create?id=<?=$project->id?>"
                            title="Добавить вакансию на проект"
                            aria-label="Добавить вакансию на проект"
                            style="float: right; padding-left: 5px">
                             <span class="glyphicon glyphicon-plus"></span></a>
                        <a data-pjax="0"
                            href="/project/project/change-state?id=<?=$project->id?>&state=2&ProjectSearch[state]=<?=$_REQUEST['ProjectSearch']['state']??''?>"
                            title="Закрыть проект"
                            aria-label="Закрыть проект"
                            style="float: right; padding-left: 5px; color: green;">
                             <span class="glyphicon glyphicon-check"></span></a>
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
                        <small><a data-pjax="0" href="/hr/main?InterviewSearch[state]=4&InterviewSearch[project_id]=<?=$project->id?>">Работ:</a> <?=$count?></small>
                    </span>
                    <span>
                        <small><a data-pjax="0" href="/hr/main?InterviewSearch[state_min]=4&InterviewSearch[project_id]=<?=$project->id?>">Найм:</a> <?=$countInt?></small>
                    </span>
                    <span>
                        <small><a data-pjax="0" href="/project/project-vacancy?ProjectVacancySearch[project_id]=<?=$project->id?>">Ваканс:</a> <?=$vacacount?></small>
                    </span>

                    <div class="btn-group" style="width: 100%;">
                        <?php if ($vacacount == 0) : ?>
                            <a data-pjax="0"
                               href="/project/project-vacancy/create?id=<?=$project->id?>"
                               class="btn btn-block btn-default"
                               title="Добавить вакансию на проект"
                               aria-label="Добавить вакансию на проект"
                               style="">
                                <i class="fa fa-plus"></i> Добавить вакансию на проект</a>
                        <?php else : ?>
                            <button  type="button" class="btn btn-block btn-hr dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-list"></i> Выбрать вакансии для найма
                            </button>

                            <div style="width: 110%;" class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <?php foreach($vacaVaca as $projectVacancy) :
                                    if (!$startUrl)
                                        $startUrl = "/hr/form/index?projectId={$project->id}&vacancyId={$projectVacancy->vacancy_id}"?>

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

            echo $dp->pagination ? LinkPager::widget([
                'pagination' => $dp->pagination,
            ]) : '';

        foreach ($list as $k => $item) {
            $panel .= '
                <a href="'.$item['url'].'" class="'.(@$item['class']??'btn btn-success').'">
                <i class="fa fa-'.$item['icon'].'"></i> '.$item['label'].' 
                </a>';
        }
        $this->params['panel'] = $panel;
        ?>
    </div>

    <?php Pjax::end(); ?>

</div>

<script>
    $("select").val("count");
    var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    };
    myLineChart = new Chart(document.getElementById("plan").getContext('2d'), {
        type: 'bar',
        data: {
            labels: [<?=$interviewProgress->getLabelsString()?>],

            datasets: [{
                label: 'Статистика найма',
                data: [<?=$interviewProgress->getDataString()?>],
                backgroundColor: [<?=$interviewProgress->getColorsString()?>],
            }]
        },
        options: options
    });

    plan.onclick = function(evt){
        var activePoints = myLineChart.getElementsAtEvent(evt);
        console.log(activePoints);
        window.location.href = '/hr/main?InterviewSearch[state]=' + activePoints[0]._index;
        // => activePoints is an array of points on the canvas that are at the same position as the click event.
    };

</script>
