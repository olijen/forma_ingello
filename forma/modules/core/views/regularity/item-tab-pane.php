<!--Контент итемов-->

<div id="menu<?= $item->id ?>" class="tab-pane fade">
    <h3><?= $item->title ?></h3>
    <p><?= $item->description ?></p>;
    <?php
    if (isset($regularity)){
        echo $this->render('user-main-item', [  //рендер файла в котором происходит
            'regularity' => $regularity,        // формирование итемов(в данном лучае суб итемов)
            'items' => $subItems,
            'parentItem' => $item,
            'checkSubItem' => true,
        ]);
    }
    ?>
</div>