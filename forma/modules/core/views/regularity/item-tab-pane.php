<div id="menu<?= $item->id ?>" class="tab-pane fade">
    <h3><?= $item->title ?></h3>
    <p><?= $item->description ?></p>;
    <?php
    if (isset($regularity)){
        echo $this->render('user-main-item', [  //рендер субитемов
            'regularity' => $regularity,
            'items' => $subItems,
            'parentItem' => $item,
            'checkSubItem' => true,
        ]);
    }
    ?>
</div>
