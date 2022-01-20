<?php

use forma\modules\core\services\UserProfileChartService;
use kartik\daterange\DateRangePicker;
use kartik\form\ActiveForm;
use yii\widgets\Pjax;

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
            'action' => '/core/user-profile/'
        ]) ;

        $addon = <<< HTML
<span class="input-group-text">
    <i class="fas fa-calendar-alt"></i>
</span>
HTML;
        echo '<div class="input-group drp-container">';
        echo DateRangePicker::widget([
//                'addon'=>['prepend'=>['content'=>'<i class="fas fa-calendar-alt"></i>']],
    'options'=>['class'=>'drp-container mb-2'],
                'name'=>'myChart',
                'convertFormat'=>true,
            'useWithAddon'=>true,
                'startAttribute' => 'from_date',
                'endAttribute' => 'to_date',
            'pluginOptions'=>[
                    'locale'=>['format' => 'Y-m-d'],
            ],
        ]). $addon; ;
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

<script>
    $(document).ready(function (){

        $('grid').click( 'apply.daterangepicker',function (){alert(1)})
    })
    myChart = new Chart(document.getElementById('myChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: [<?=$data[0]?>],

            datasets: [{
                label: 'Количество пройденных испытаний',
                data: [<?=$data[1]?>],
            }]
        },
        options: {}
    });
</script>



