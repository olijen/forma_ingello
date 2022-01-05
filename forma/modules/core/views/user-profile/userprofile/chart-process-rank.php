<?php

use forma\modules\core\services\UserProfileChartService;

$userProfileChart = new UserProfileChartService();

?>
<div class="col-md-4">
    <h1 style="text-align: center">График</h1>

<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title" id="scrol">График количества пройденных правил</h3>

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
</div>

<script>

    myChart = new Chart(document.getElementById('myChart').getContext('2d'), {
        type: 'line',
        data: {
            labels: [<?=$userProfileChart->getDate()?>],
            datasets: [{
                label: 'Количество изменений',
                data: [<?=$userProfileChart->getCount()?>],
                backgroundColor: ['transparent'],
                borderColor: ['green'],
            }]
        },
        options: {}
    });
</script>
