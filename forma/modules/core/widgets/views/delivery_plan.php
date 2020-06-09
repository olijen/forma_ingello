<div class="box box-warning" data-widget_name="DeliveryPlan">
        <div class="box-header with-border big_widget_header">
            <h3 class="box-title">Выполнение плана поставок</h3>

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
                <canvas id="post"></canvas>
            </div>
        </div>
        <div class="small_widget_header box-header" style="display: none">
            <h3 class="box-title">Выполнение плана поставок</h3>
        </div>
        <!-- /.box-body -->
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
        new Chart(document.getElementById("post").getContext('2d'), {
            type: 'pie',
            data: {
                labels: ["Поставщик 1", "Поставщик 2", "Поставщик 3", "Поставщик 4"],
                datasets: [{
                    label: 'Единиц поставки',
                    data: [1000, 140, 270, 750],
                    backgroundColor: [
                        'rgba(221, 75, 57, 1)',
                        'rgba(0, 166, 90, 1)',
                        'rgba(60, 141, 188, 1)',
                        'rgba(243, 156, 18, 1)',
                    ],
                }]
            },
            options: options
        });
    </script>