
<?php $interviewProgress = new \forma\modules\hr\forms\InterviewProgress();?>
<div class="box box-success" data-widget_name="HiringFunnel">
    <div class="box-header with-border big_widget_header">
        <h3 class="box-title" id="scroll">Этапы (воронка найма)</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                    class="fa fa-minus"></i>
            </button>
        </div>
    </div>

    <div class="box-body">
        <div class="chart">
            <canvas id="plan_hr" style=""></canvas>
        </div>
    </div>
    <div class="box-header with-border small_widget_header" style="display: none">
        <h3 class="box-title">Этапы (воронка найма)</h3>
    </div>
</div>
<script>
    var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    };
    myLineChartHr = new Chart(document.getElementById("plan_hr").getContext('2d'), {
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

    plan_hr.onclick = function(evt){
        var activePoints = myLineChartHr.getElementsAtEvent(evt);
        console.log(activePoints);
        window.location.href = '/hr/main?InterviewSearch[state]=' + activePoints[0]._index;
        // => activePoints is an array of points on the canvas that are at the same position as the click event.
    };
</script>