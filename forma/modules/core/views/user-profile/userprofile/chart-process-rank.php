<div class="col-md-4">
    <h1 style="text-align: center">График</h1>
</div>

<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title" id="scrollllllllll">История изменений состояния продаж</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
        <div class="chart">
            <div class="chart">
                <canvas id="myChart" style=""></canvas>
            </div>
        </div>
    </div>
</div>
<?php
$date = strtotime('monday this week');
$dates = '';
for($i = 1;$i < 8;$i++) {
$dates.= '\''.date("d.m.Y", $date).'\',';
$date =  strtotime('+1 day', $date);
}
$count = \forma\modules\core\records\UserRuleRank::find()->where(['user_profile_id' => Yii::$app->user->id])
    ->groupBy(['date'])->select(['date', 'count(id)'])->all()

;
dd($count);
//    ->count();
?>
<script>

    myChart = new Chart(document.getElementById('myChart').getContext('2d'), {
        type: 'line',
        data: {
            labels: [<?=$dates?>],
            datasets: [{
                label: 'Количество изменений',
                data: [<?=$count?>],
                backgroundColor: ['transparent'],
                borderColor: ['green'],
            }]
        },
        options: {}
    });
</script>
