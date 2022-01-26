<?php
use forma\modules\sellinghistory\records\SellingHistory;
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
$sellingHistory = new \forma\modules\selling\forms\SalesProgress();
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
/** @var forma\modules\hr\forms\InterviewProgress $interviewProgress */
$interviewProgress = new \forma\modules\hr\forms\InterviewProgress();
?>

<div class="col-lg-9 col-xs-12" >

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title" id="scroll">История изменений состояния продаж </h3>

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
    <?php
//    $date = getdate(); // использовано текущее время
//    $month = $date['mon'];
//    $number =  date('t', mktime(0, 0, 0, $month));
//    $datadays = range(1,$number);
//    $result = '';
//    foreach ($datadays as $dates) {
//        $result .= '"' . $date['year'].'-'. $month .'-'.$dates. '",';
//    }
    $list=array();
    for($d=1; $d<=31; $d++)
    {
        $time=mktime(12, 0, 0, date('m'), $d, date('Y'));
        if (date('m', $time)==date('m'))
            $list[]=date('d.m.Y', $time);
    }
    $result = '';
    foreach ($list as $dates) {

        $result .= '"' . $dates . '",';
    }
    ?>
    myChart = new Chart(document.getElementById('myChart').getContext('2d'), {
        type: 'line',
        data: {
             //labels: [<?//=$result,$salesProgress->getDate(),?>//],
            datasets: [{
                label: 'Количество изменений',
                //data: [<?//=$salesProgress->getCount()?>//],
                backgroundColor: ['transparent'],
                borderColor: ['green'],
            }]
        },
        options: {}
    });
</script>