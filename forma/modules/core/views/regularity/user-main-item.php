<?php
//За контейнер, который нельзя назвать как container-fluid скажите спасибо алгоритму, который перекидывает
//пункты регламента, поэтому <div class="container fluid" > ОСТАНЕТСЯ ТАКИМ!!!
//НЕ ДЕЛАТЬ ЕГО container-fluid !!!!!
?>
<div class="container fluid" style="<?= !isset($checkSubItem) ? 'padding: 4px;' : '' ?>">
    <div class="carousel" style="overflow-x: hidden">

        <?php foreach ($items as $item) {
            $radioName = isset($checkSubItem) ? 'sub-item' : 'item';

            if (isset($checkSubItem) && isset($parentItem)) {//условие для субитемов(вложеных итемов)
                if ($item->parent_id == $parentItem->id) {
                    echo $this->render('item-href', [
                        'radioName' => $radioName,
                        'parentItem' => $parentItem,
                        'regularity' => $regularity,
                        'item' => $item,

                    ]);
                }
            } else {
                if ($item->regularity_id == $regularity->id && is_null($item->parent_id)) {//условие для итемов родителей
                    echo $this->render('item-href', [
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
            $parentClass = !isset($checkSubItem) ? 'parent' : '';
            $openTabPaneDiv = '<div id="menu' . $item->id . '"   class="tab-pane fade ' . $parentClass . '"
                                    data-prev="true"   data-href="menu' . $item->id . '"
                               >';
            $content = $item->id;
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








