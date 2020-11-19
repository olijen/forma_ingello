<?php

/* @var $model \forma\modules\warehouse\records\WarehouseProduct */

?>

<div class="box box-success col-md-6">
    <div class="box-header with-border">
        <h3 class="box-title"><?=$model->product->sku?></h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Свернуть">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="" data-toggle="tooltip" title="" data-original-title="">
                <i class="fa fa-image"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="" data-toggle="tooltip" title="" data-original-title="">
                <i class="fa fa-user"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Удалить">
                <i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <?=$model->product->name?>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
    </div>
    <!-- /.box-footer-->
</div>
