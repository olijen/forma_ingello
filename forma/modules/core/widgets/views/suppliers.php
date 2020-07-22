
    <div class="box box-danger" data-widget_name="Suppliers">
        <div class="box-header with-border big_widget_header">
            <h3 class="box-title"><i class="fas fa-map-marker-alt"></i> Поставщики на карте</h3>

            <div class="box-tools pull-right">
                <div class="btn-group">
                    <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bars"></i></button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li><a href="/supplier/supplier/">Смотреть поставщиков</a></li>
                    </ul>
                </div>
                <button type="button" class="btn btn-warning btn-sm"  data-widget="collapse"><i
                            class="fa fa-minus"></i>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <!-- Chat box -->
            <div class="">

                <!-- Map box -->
                <?= yii2mod\google\maps\markers\GoogleMaps::widget([
                    'userLocations' => \forma\modules\product\records\Manufacturer::getLocations(),
                    'wrapperHeight' => '300px',
                ]); ?>
                <!-- /.box -->

            </div>

            <!-- /.users-list -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
            <a href="javascript:void(0)" class="uppercase">View All Users</a>
        </div>
        <!-- /.box-footer -->
        <div class="box-header small_widget_header" style="display: none">
            <h3 class="box-title">Поставщики на карте</h3>
        </div>
    </div>
