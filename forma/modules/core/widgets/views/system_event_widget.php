<?php
/**
 * @var Selling $sellingInWarehouse array with quantity of sales on warehouses
 */

use forma\modules\core\components\LinkHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\ListView;
use yii\widgets\Pjax;

?>
<style>
    .sortable .timeline li,
    .sortable .pagination li{
        border: none;
        cursor: auto;
        float: none;
        min-height: auto;
        min-width: auto;
        text-align: left;
    }

    .sortable .timeline li:hover,
    .sortable .pagination li:hover{
        background-color: transparent;
    }
</style>
<div class="box box-warning" data-widget_name="HistoryEvent">
    <div class="box-header with-border big_widget_header">
        <h3 class="box-title"><i class="fas fa-history"></i> История событий</h3>

        <div class="box-tools pull-right">
            <div class="btn-group">
                <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bars"></i></button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="/core/system-event/"><i class="fa fa-history"></i>Смотреть историю событий</a></li>
                    <li><a href="/core/system-event-user/subscribe"><i class="fa fa-check-circle"></i>Подписаться на события</a></li>
                </ul>
            </div>
            <button type="button" class="btn btn-warning btn-sm"  data-widget="collapse"><i
                        class="fa fa-minus"></i>
        </div>
    </div>
    <div class="box-body" style="max-height: 400px; overflow: scroll">
        <?php Pjax::begin(['enablePushState' => false, 'timeout' => 3000]);

            require_once 'history_event_timeline.php';
        Pjax::end();
        ?>
    </div>
    <div class="small_widget_header box-header" style="display: none">
        <h3 class="box-title" data-toggle="tooltip" data-placement="top" title="История событий"> <i class="fas fa-history"></i> </h3>
    </div>
    <!-- /.box-body -->
</div>