<?php
/**
 * @var Selling $sellingInWarehouse array with quantity of sales on warehouses
 */
?>

<div class="box box-warning" data-widget_name="SalesWarehouse">
    <div class="box-header with-border big_widget_header">
        <h3 class="box-title"><i class="fas fa-boxes"></i> Продажи по складам</h3>

        <div class="box-tools pull-right">
            <div class="btn-group">
                <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bars"></i></button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="/warehouse/warehouse/">Смотреть склады</a></li>
                </ul>
            </div>
            <button type="button" class="btn btn-warning btn-sm"  data-widget="collapse"><i
                    class="fa fa-minus"></i>
        </div>
    </div>
    <div class="box-body">
        <div class="chart">
            <canvas id="sales_warehouse"></canvas>
        </div>
    </div>
    <div class="small_widget_header box-header" style="display: none">
        <h3 class="box-title">Продажи по складам</h3>
    </div>
    <!-- /.box-body -->
</div>
<script>
    var warehouseName = [];
    var warehouseSales = [];
    var warehouseColors = [];
</script>
<?php
for($i = 0; $i < count($sellingInWarehouse); $i++){
    Yii::debug($sellingInWarehouse[$i]->warehouse->name);
    ?>
    <script>
        warehouseName.push('<?=$sellingInWarehouse[$i]->warehouse->name?>');
        warehouseSales.push(<?=$sellingInWarehouse[$i]->sale_warehouse?>);
        warehouseColors.push('rgba('+Math.floor(Math.random() * Math.floor(256))+', '+Math.floor(Math.random() * Math.floor(256))+', '+Math.floor(Math.random() * Math.floor(256))+', 1)');
    </script>
<?php }
?>
<script>
    console.log(warehouseName);
    console.log(warehouseSales);
    var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    };
    new Chart(document.getElementById("sales_warehouse").getContext('2d'), {
        type: 'pie',
        data: {
            labels: warehouseName,
            datasets: [{
                label: 'Единиц поставки',
                data: warehouseSales,
                backgroundColor: warehouseColors,
            }]
        },
        options: options
    });
</script>