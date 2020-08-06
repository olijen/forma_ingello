<ul class="nav nav-tabs">
    <?php foreach ($subItems as $subItem): ?>
        <?php if ($subItem->parent_id == $item->id) {
            echo $this->render('create-li', [
                'id' => $subItem->id,
                'activeId' => false,
                'addHrefName' => 'subItem',
                'navBarName' => $subItem->title,
                'description' => $subItem->description,
                'nameOnPicture' => 'Регламент: ' . $regularity->name . '  Пунтк: ' . $item->title . '  Подпункт: ' . $subItem->title,
                'picture' => $item->picture,
            ]);
        } ?>
    <?php endforeach; ?>
</ul>

<div class="tab-content">
    <?php foreach ($subItems as $subItem): ?>
        <?php if ($subItem->parent_id == $item->id): ?>
            <div class="tab-pane <?= $subItem->id ?>"
                 id="tab_subItem_<?= $subItem['id'] ?>">
                <div class="box-body">
                    <?= $subItem->description ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>