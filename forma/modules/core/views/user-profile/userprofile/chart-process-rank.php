<?php

use forma\modules\core\services\UserProfileChartService;
use kartik\daterange\DateRangePicker;
use kartik\form\ActiveForm;
use yii\widgets\Pjax;

$userProfileChart = new UserProfileChartService();
?>
<div class="col-md-6 col-sm-12 col-12 stretch-card">
    <div class="box box-success">
        <div class="box-header with-border big_widget_header">
            <h3 class="box-title">
                График
            </h3>
        </div>
        <?php

        Pjax::begin(['id' => 'grid']) ;
        $form = ActiveForm::begin([
            'id' => 'login-form',
            'options' => ['class' => 'form-horizontal'],
            'method' => 'POST',
            'action' => '/core/user-profile/filter-chart'
        ]) ;


        echo '<div class="input-group drp-container">';
        echo '<span class="input-group-text">
    <i class="fas fa-calendar-alt"></i>
</span>';
        echo DateRangePicker::widget([
                'name'=>'myChart',
                'useWithAddon'=>true,
                'convertFormat'=>true,
                'startAttribute' => 'from_date',
                'endAttribute' => 'to_date',
            'pluginOptions'=>[
                    'locale'=>['format' => 'Y-m-d'],
                ],
            'pluginEvents' =>[
                "change" => "newChart()",
            ]


        ]) ;
        echo '</div>';

        ActiveForm::end();

        Pjax::end();




        ?>
        <div class="box-body">
            <div class="chart">
                <canvas id="myChart" style=""></canvas>
            </div>
        </div>
    </div>

</div>


<!--<input type="text" name="daterange" value="01/01/2018 - 01/15/2018" />-->

<!--<script>-->
<!--    $(function() {-->
<!--        $('input[name="myChart"]').daterangepicker({-->
<!--            opens: 'left'-->
<!--        }, function(start, end, label) {-->
<!--            alert(1)-->
<!--        });-->
<!--    });-->
<!--</script>-->

<script>
    $(document).ready(function (){

        $('grid').click( 'apply.daterangepicker',function (){alert(1)})
    })
    myChart = new Chart(document.getElementById('myChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: [<?=$userProfileChart->getDate()?>],

            datasets: [{
                label: 'Количество пройденных испытаний',
                data: [<?=$userProfileChart->getCount()?>],
            }]
        },
        options: {}
    });
</script>

<script>
    $(document).ready(function (){
        function newChart(){
            alert(1)
        }
    })
</script>

