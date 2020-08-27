<div class="container">
    <div class="carousel">

        <?php foreach ($items as $item) {
            $radioName = isset($checkSubItem) ? 'sub-item' : 'item';

            if (isset($checkSubItem) && isset($parentItem)) {//условие для субитемов(вложеных итемов)
                if ($item->parent_id == $parentItem->id) {   // Рендор радио суб итемов
                    echo $this->render('item-href', [
                        'radioName' => $radioName,
                        'parentItem' => $parentItem,
                        'regularity' => $regularity,
                        'item' => $item,
                    ]);

                }
            } else {
                if ($item->regularity_id == $regularity->id && is_null($item->parent_id)) {//условие для итемов родителей
                    echo $this->render('item-href', [                                      // Рендор радио основных итемов
                        'radioName' => $radioName,
                        'regularity' => $regularity,
                        'item' => $item,

                    ]);

                }
            }
        }
        ?>

    </div>


    <div class="tab-content">
        <?php foreach ($items as $item) {

            $openTabPaneDiv = '<div id="menu' . $item->id . '" class="tab-pane fade" data-href="menu' . $item->id . '">';
            $content = $item->id;
            $closeTabPaneDiv = '</div>';

            if (isset($checkSubItem) && isset($parentItem)) {//условие для контента субитемов(вложеных итемов)
                if ($item->parent_id == $parentItem->id) {//разные сравнения
                    echo $this->render('item-tab-pane', [  //рендер субитемов
                        'item' => $item,
                    ]);

                }

            } elseif ($item->regularity_id == $regularity->id && is_null($item->parent_id)) {//условие для контента итемов родителей
                echo $this->render('item-tab-pane', [        //рендер блока с контентом основных итемов
                    'regularity' => $regularity,
                    'subItems' => $subItems,
                    'item' => $item,
                ]);

            }
        }
        ?>
    </div>
</div>








