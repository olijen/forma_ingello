<?php use forma\modules\core\components\LinkHelper;


?>


<ul class="nav nav-tabs">
    <?php foreach ($items as $item): ?>
        <?php if ($regularity->id == $item->regularity_id && is_null($item->parent_id)): ?>
            <li class="<?= $item->id ?> ">
                <a href="#tab_item_<?= $item['id'] ?>" data-toggle="tab">
                    <?= $item->title; ?>
                </a>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>

<div class="tab-content">
    <?php foreach ($items as $item): ?>
        <?php if ($regularity->id == $item->regularity_id): ?>
            <div class="tab-pane <?= $item->id ?>"
                 id="tab_item_<?= $item['id'] ?>">
                <div class="box-body">
                    <?= $item->description ?>

                    <?= $this->render('user-sub-item', [
                        'item' => $item,
                        'subItems' => $subItems,
                    ]) ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
    <!-- /.tab-pane -->
</div>







