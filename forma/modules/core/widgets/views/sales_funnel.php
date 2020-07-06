<div class="col-lg-9 col-xs-12">

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title" id="scroll">Воронка продаж <span style="padding-left: 20px; color:#abc"><i class="fa fa-mouse-pointer"></i> кликни на колонку</span></h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                        class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
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

<?php
$salesProgress = new \forma\modules\selling\forms\SalesProgress();
?>

<script>
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

    plan.onclick = function(evt){
        var activePoints = myLineChart.getElementsAtEvent(evt);
        console.log(activePoints);
        window.location.href = '/selling/main?SellingSearch[state_id]=' + (getId(activePoints[0]._index)) ;
    };
</script>