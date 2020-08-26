<div class="container">
    <div class="cont-carousel">
        <button class="arrow prev">⇦</button>
        <div class="carousel">

            <?php foreach ($items as $item) {
                $radioName = 'item';
                if (isset($checkSubItem)) {
                    $radioName = 'sub-item';
                }

                if (isset($checkSubItem) && isset($parentItem)) {//условие для субитемов(вложеных итемов)
                    if ($item->parent_id == $parentItem->id) {
                        echo $this->render('item-href', [
                            'radioName' => $radioName,
                            'item' => $item,

                        ]);
                    }
                } else {
                    if ($item->regularity_id == $regularity->id && is_null($item->parent_id)) {//условие для итемов родителей
                        echo $this->render('item-href', [
                            'radioName' => $radioName,
                            'item' => $item,

                        ]);
                    }
                }
            }
            ?>

        </div>
        <button class="arrow next">⇨</button>
    </div>

    <div class="tab-content">
        <?php foreach ($items as $item) {

            $openTabPaneDiv = '<div id="menu' . $item->id . '" class="tab-pane fade" data-href="menu' . $item->id . '">';
            $closeTabPaneDiv = '</div>';

            if (isset($checkSubItem) && isset($parentItem)) {//условие для контента субитемов(вложеных итемов)
                if ($item->parent_id == $parentItem->id) {//разные сравнения
                    echo $openTabPaneDiv;
                    echo $closeTabPaneDiv;

                }

            } elseif ($item->regularity_id == $regularity->id && is_null($item->parent_id)) {//условие для контента итемов родителей
                echo $openTabPaneDiv;
                echo $this->render('user-main-item', [  //рендер субитемов
                    'regularity' => $regularity,
                    'items' => $subItems,
                    'parentItem' => $item,
                    'checkSubItem' => true,
                ]);
                echo $closeTabPaneDiv;

            }
        }
        ?>
    </div>
</div>








