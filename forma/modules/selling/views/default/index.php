<?php

use yii\helpers\Url;


$this->title = 'Продажи';
$this->params['doc-page'] = 'Selling';

$list = [
    ['label' => 'Продажи', 'url' => '/selling/main', 'icon' => 'balance-scale',

    ],
    ['label' => 'Речевые модули', 'url' => '/selling/speech-module', 'icon' => 'podcast',

    ],
    ['label' => 'Состояния', 'url' => '/selling/main-state', 'icon' => 'podcast',

    ],
];

?>

<?php
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
/** @var forma\modules\hr\forms\InterviewProgress $interviewProgress */
$interviewProgress = new \forma\modules\hr\forms\InterviewProgress();
?>

<div class="col-lg-9 col-xs-12">

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title" id="scroll">Этапы (воронка найма)</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
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

<div class="row">
    <?php foreach ($list as $k => $item): ?>
        <a href="<?= $item['url'] ?>">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">

                    <span class="info-box-icon bg-green"><i class="fa fa-<?= $item['icon'] ?>"></i></span>

                    <div class="info-box-content">

                        <span class="info-box-text"><?= $item['label'] ?></span>

                        <span class="info-box-number"><?= rand(100, 10000) ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </a>
    <?php endforeach ?>
</div>

<script>
    // обработка воронки продаж
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
            labels: [<?=$salesProgress->getLabelsString()?>],

            datasets: [{
                label: 'Количество продаж',
                data: [<?=$salesProgress->getDataString()?>],
                backgroundColor: [<?=$salesProgress->getColorsString()?>],
            }]
        },
        options: options
    });

    plan.onclick = function (evt) {
        var activePoints = myLineChart.getElementsAtEvent(evt);
        console.log(activePoints);
         window.location.href = '/selling/main?SellingSearch[state_id]=' + activePoints[0]._index;
        // window.location.href = '/selling/main';
        // => activePoints is an array of points on the canvas that are at the same position as the click event.
    };

</script>
