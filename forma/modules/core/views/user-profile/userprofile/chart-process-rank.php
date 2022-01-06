<?php

use forma\modules\core\services\UserProfileChartService;

$userProfileChart = new UserProfileChartService();

?>
<div class="col-md-6 col-sm-12 col-12 stretch-card">
    <div class="box box-success">
        <div class="box-header with-border big_widget_header">
            <h3 class="box-title">
                График
            </h3>
        </div>
        <div class="box-body">
            <div class="chart">
                <canvas id="myChart" style=""></canvas>
            </div>
        </div>
    </div>

</div>
<script>

    myChart = new Chart(document.getElementById('myChart').getContext('2d'), {
        type: 'bar',
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
