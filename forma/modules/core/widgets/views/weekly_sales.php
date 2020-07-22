    <div class="box box-success" data-widget_name="WeeklySales">
        <div class="box-header with-border big_widget_header">
            <h3 class="box-title"><i class="fas fa-shopping-cart"></i> Продажи за неделю</h3>

            <div class="box-tools pull-right">
                <div class="btn-group">
                    <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bars"></i></button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li><a href="/selling/main/">Смотреть продажи</a></li>
                    </ul>
                </div>
                <button type="button" class="btn btn-warning btn-sm"  data-widget="collapse"><i
                            class="fa fa-minus"></i>
            </div>
        </div>
        <div class="box-body">
            <div class="chart">
                <canvas id="sales"></canvas>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-header small_widget_header" style="display: none">
            <h3 class="box-title" data-toggle="tooltip" data-placement="top" title="Продажи за неделю"><i class="fas fa-shopping-cart"></i></h3>
        </div>
    </div>