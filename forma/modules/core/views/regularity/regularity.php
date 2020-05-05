<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <?php foreach ($regularitys as $regularity):?>
            <li class="<?= $regularity['id'] == $order_id ? 'active' : '' ?> ">
                <a href="#tab_<?= $regularity['id'] ?>" data-toggle="tab">
                    <?= $regularity['name'] ?>
                </a>
            </li>
        <?php endforeach; ?>
        <a href="/core/regularity/settings">
            <i class="fa fa-cog"></i>
        </a>
    </ul>

    <div class="tab-content">
        <?php foreach ($regularitys as $regularity): ?>
            <div class="tab-pane <?= $regularity['id'] == $order_id ? 'active' : '' ?>"
                 id="tab_<?= $regularity['id'] ?>">

                <?php foreach ($regularity->items as $item) {
                    if ($item['parent_id'] != null) {
                        $items[] = $item;
                    }
                }
                ?>

                <?= $this->render('main_item', [
                    'regularity' => $regularity,
                    'items' => $items,
                ]) ?>

                <a href="/core/item/create?regularity_id=<?= $regularity['id'] ?>">
                    <i class="fa fa-plus"></i>
                    Добавить пункт
                </a>
                <!-- /.tab-pane -->
            </div>
        <?php endforeach; ?>
        <!-- /.tab-pane -->
    </div>

</div>
