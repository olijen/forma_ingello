<?php use forma\modules\core\components\LinkHelper; ?>

<style>
    h4 {
       width: 100%;
    }

    .regularity_name {
        width: 85%;
    }
</style>

<div class="box box-solid">
    <div class="box-header with-border">
        <h4 class="box-title"><i class="fa fa-<?= $regularity['icon'] ?>"></i> <?= $regularity['title'] ?></h4>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="box-group" id="accordion">

            <?php foreach ($regularity->items as $item): ?>
                <?php if (is_null($item['parent_id'])): ?>
                    <div class="panel box box-success"
                         style="margin-bottom: 5px; border-top-color: <?= $item['color'] ?>">
                        <div class="box-header with-border"
                             style=" padding: 0">
                            <h4 class="box-title" style="padding: 0 15px">
                                <a href="/core/item/update?id=<?= $item['id'] ?>">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="/core/item/create?regularity_id=<?= $regularity['id'] ?>&parent_id=<?= $item['id'] ?>">
                                    <i class="fa fa-plus"></i>
                                </a>
                                <a href="/core/item/delet?id=<?= $item['id'] ?>" onclick="return confirm('Вы уверены, что хотите удалить этот пункт?')">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <a data-toggle="collapse" data-parent="#accordion"
                                   href="#collapse_<?= $item['id'] ?>" class="regularity_name collapsed"
                                   aria-expanded="false" style="display: inline-table; padding:15px 0;">
                                    | <?= $item['title']; ?>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse_<?= $item['id'] ?>"
                             class="panel-collapse collapse"
                             aria-expanded="false" style="height: 0px;">
                            <div class="box-body">
                                <?php echo LinkHelper::replaceUrlOnButton($item['description']); ?>

                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="box-group" id="accordion1">

                                        <?php if ($items): ?>
                                            <?= $this->render('nested_item', [
                                                'item' => $item,
                                                'items' => $items,
                                            ]); ?>
                                        <?php endif ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->


<script>
    $('.regularity_name').hover(function (event) {
        $( event.target ).closest('.box-header').css('background-color', 'rgba(0, 200, 0, 0.15)');
    }, function (event) {
        $( event.target ).closest('.box-header').css('background-color', 'transparent');
    })
</script>




