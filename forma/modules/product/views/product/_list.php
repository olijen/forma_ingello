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
            <button onclick="window.location.href='/product/product/update?id=<?=$model->id?>'" type="button" class="btn btn-box-tool" title="" data-original-title="Редактировать">
                <i class="fa fa-image"></i></button>

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
