<?php

/** @var Product $model */

use forma\modules\product\records\Product;

?>

<div class="box box-success col-md-6">
    <div class="box-header with-border">
        <h3 class="box-title"><?=$model->sku?></h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Свернуть">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Удалить">
                <i class="fa fa-image"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Удалить">
                <i class="fa fa-user"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Удалить">
                <i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <?=$model->name?>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
    </div>
    <!-- /.box-footer-->
</div>
