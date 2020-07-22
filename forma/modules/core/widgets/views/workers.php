<div class="box box-info" data-widget_name="Workers">
    <div class="box-header with-border big_widget_header">
        <h3 class="box-title"><i class="fas fa-users"></i> Работающие сотрудники</h3>

        <div class="box-tools pull-right">
            <div class="btn-group">
                <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bars"></i></button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="/worker/worker">Смотреть сотрудников</a></li>
                </ul>
            </div>
            <button type="button" class="btn btn-warning btn-sm"  data-widget="collapse"><i
                        class="fa fa-minus"></i>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding" style="max-height: 400px; overflow: scroll;">
        <?php

        use yii\widgets\Pjax;

        Pjax::begin(['enablePushState' => false, 'timeout' => 3000]);
            require_once 'workers_table.php';
        Pjax::end();
        ?>
        <!-- /.users-list -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer text-center">
        <a href="/hr/main/" class="uppercase">Смотреть всех работников</a>
    </div>
    <!-- /.box-footer -->
    <div class="box-header with-border small_widget_header" style="display: none">
        <h3 class="box-title" data-toggle="tooltip" data-placement="top" title="Сотрудники"><i class="fas fa-users"></i></h3>
    </div>
</div>