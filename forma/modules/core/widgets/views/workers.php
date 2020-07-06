<div class="box box-info" data-widget_name="Workers">
    <div class="box-header with-border big_widget_header">
        <h3 class="box-title">Работающие сотрудники</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                    class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
            </button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding" style="max-height: 400px; overflow: scroll;">
        <?php

        use yii\widgets\Pjax;

        Pjax::begin(['enablePushState' => false]);
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
        <h3 class="box-title">Сотрудники</h3>
    </div>
</div>