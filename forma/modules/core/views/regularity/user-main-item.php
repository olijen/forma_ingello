<?php use forma\modules\core\components\LinkHelper; ?>


<ul class="nav nav-tabs">
    <?php foreach ($items as $item): ?>
        <?php if ($item->regularity_id == $regularity->id && is_null($item->parent_id))
            echo $this->render('create-li', [
                'id' => $item->id,
                'activeId' => false,
                'addHrefName' => 'item',
                'navBarName' => $item->title,
                'description' => $item->description,
                'nameOnPicture' => 'Регламент: ' . $regularity->name . '  Пунтк: ' . $item->title,
                'picture' => $item->picture,
            ]);
        ?>
    <?php endforeach; ?>
</ul>

<div class="tab-content">
    <?php foreach ($items as $item): ?>
        <?php if ($regularity->id == $item->regularity_id): ?>
            <div class="tab-pane <?= $item->id ?>" id="tab_item_<?= $item['id'] ?>">
                <div class="box-body">
                    <?= $item->description ?>

                    <?= $this->render('user-sub-item', [
                        'item' => $item,
                        'subItems' => $subItems,
                        'regularity' => $regularity,
                    ]) ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
    <!-- /.tab-pane -->
</div>







