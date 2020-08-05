<div class="box-body">
    <ul class="nav nav-tabs">
        <?php foreach ($subItems as $subItem): ?>
            <?php if ($subItem->parent_id == $item->id): ?>
                <li class="sub_<?= $subItem->id ?> ">
                    <a href="#tab_item_<?= $subItem['id'] ?>" data-toggle="tab">
                        <?= $subItem->title; ?>
                    </a>

                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>

    <div class="tab-content">
        <?php foreach ($subItems as $subItem): ?>
            <?php if ($subItem->parent_id == $item->id): ?>
                <div class="tab-pane <?= $subItem->id ?>"
                     id="tab_item_<?= $subItem['id'] ?>">
                    <div class="box-body">
                        <?= $subItem->description ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
        <!-- /.tab-pane -->
    </div>
</div>