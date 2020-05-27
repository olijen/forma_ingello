
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Поставщики на карте</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                        class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                </button>
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
    </div>
