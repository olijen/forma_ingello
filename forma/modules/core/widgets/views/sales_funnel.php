
<?php if(!$onlyChart) { ?>
<div class="box box-success" data-widget_name="SalesFunnel">

        <div class="box-header with-border big_widget_header">
            <h3 class="box-title" id="scroll"><i class="fas fa-funnel-dollar"></i> Воронка продаж <span style="padding-left: 20px; color:#abc"><i class="fa fa-mouse-pointer"></i> кликни на колонку</span></h3>

            <div class="box-tools pull-right">
                <div class="btn-group">
                    <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bars"></i></button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li><a href="/selling/default"><i class="fa fa-laptop"></i>Отдел продаж</a></li>
                        <li><a href="/selling/main"><i class="fa fa-money-bill-wave"></i>Продажи клиентам</a></li>
                        <li><a href="/selling/speech-module"><i class="fa fa-list"></i>Скрипты</a></li>
                    </ul>
                </div>
                <button type="button" class="btn btn-warning btn-sm"  data-widget="collapse"><i
                        class="fa fa-minus"></i>
            </div>
        </div>

        <div class="box-body">
            <div class="chart">
                <canvas id="plan" style=""></canvas>
            </div>
        </div>

    <div class="small_widget_header box-header" style="display: none">
        <h3 class="box-title"  data-toggle="tooltip" data-placement="top" title="Воронка продаж"><i class="fas fa-funnel-dollar"></i> </h3>
    </div>


</div>

<?php } ?>

<?php if ($onlyChart) {?>
<canvas id="planH" style=""></canvas>
<?php } ?>


<?php
$salesProgress = new \forma\modules\selling\forms\SalesProgress();
$labels = $salesProgress->getLabelsString();
$data = $salesProgress->getDataString();
$backgroundColor = $salesProgress->getColorsString();
$comaList = $salesProgress->getComaListOfSales();
?>


<script>
    myLineChart = new Chart(document.getElementById("plan").getContext('2d'), {
        type: 'bar',
        data: {
            labels: [<?=$labels?>],

            datasets: [{
                label: 'Количество продаж',
                data: [<?=$data?>],
                backgroundColor: [<?=$backgroundColor?>],
            }]
        },
        options: options
    });

    plan.onclick = function(evt){
        var activePoints = myLineChart.getElementsAtEvent(evt);
        console.log(activePoints);
        window.location.href = '/selling/main?SellingSearch[state_id]=' + (getId(activePoints[0]._index)) ;
    };
</script>

<script>
    console.log(1);
    console.log(document.getElementById("planH"));
    var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    };
    myLineChart1 = new Chart(document.getElementById("planH").getContext('2d'), {
        type: 'bar',
        data: {
            labels: [<?=$labels?>],

            datasets: [{
                label: 'Количество продаж',
                data: [<?=$data?>],
                backgroundColor: [<?=$backgroundColor?>],
            }]
        },
        options: options
    });
    console.log(myLineChart1);


    planH.onclick = function(evt){
        var activePoints = myLineChart1.getElementsAtEvent(evt);
        console.log(activePoints);
        window.location.href = '/selling/main?SellingSearch[state_id]=' + (getId(activePoints[0]._index)) ;
    };
</script>

<script>
    function getId(index) {
        return [<?=$comaList?>][index];
    }
</script>