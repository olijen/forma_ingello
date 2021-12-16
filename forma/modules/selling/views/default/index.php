<?php

use yii\helpers\Url;


$this->title = 'Продажи';
//$this->params['doc-page'] = 'Selling';

$list = [
    ['label' => 'Продажи', 'url' => '/selling/main', 'icon' => 'balance-scale',

    ],
    ['label' => 'Речевые модули', 'url' => '/selling/speech-module', 'icon' => 'podcast',

    ],
    ['label' => 'Состояния', 'url' => '/selling/main-state', 'icon' => 'list',

    ],
    ['label' => 'Генерация лидов FLH', 'url' => '/selling/freelancehunt/', 'icon' => 'users'],
    ['label' => 'Форма ставки FLH', 'url' => '/selling/freelancehunt/bid-form', 'icon' => 'comments-dollar'],


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
            <h3 class="box-title" id="scroll">Этапы (воронка продаж)</h3>

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
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title" id="scroll">История изменений состояния продаж</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="myChart">
            <div class="myChart">
                <canvas id="myChart" style=""></canvas>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <?php foreach ($list as $k => $item):
        $itemValue = rand(100, 10000);
        if ($item['label'] == 'Продажи') $itemValue = count(\forma\modules\selling\records\selling\Selling::getList());
        if ($item['label'] == 'Речевые модули') {
            $itemValue = count(\forma\modules\selling\records\strategy\Strategy::getList());
        }
        if ($item['label'] == 'Состояния') $itemValue = count(\forma\modules\selling\records\state\State::find()->where(['user_id' => Yii::$app->user->id])->all());
        ?>
        <a href="<?= $item['url'] ?>">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">

                    <span class="info-box-icon bg-green"><i class="fa fa-<?= $item['icon'] ?>"></i></span>

                    <div class="info-box-content">

                        <span class="info-box-text"><?= $item['label'] ?></span>

                        <span class="info-box-number"><?= $itemValue ?></span>
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


    function getId(index) {
        return [<?=$salesProgress->getComaListOfSales()?>][index];
    }

    plan.onclick = function (evt) {
        var activePoints = myLineChart.getElementsAtEvent(evt);
        console.log(activePoints);
        window.location.href = '/selling/main?SellingSearch[state_id]=' + (getId(activePoints[0]._index));
    };

</script>
<script>

    myChart = new Chart(document.getElementById('myChart').getContext('2d'), {
        type: 'line',
        data: {
            labels: [<?= $salesProgress->getDate() ?>],
            datasets: [{
                label: 'Количество изменений',
                data: [<?= $salesProgress->getCounte() ?>],
                backgroundColor: ['transparent'],
                borderColor: ['green'],
            }]
        },
        options: {}
    });
</script>
