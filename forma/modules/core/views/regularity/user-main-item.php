<?php

use yii\helpers\Html;


?>


<div class="container">
    <div class="carousel">
        <?php foreach ($items as $item) {
            $radioName = isset($checkSubItem) ? 'sub-item' : 'item';

            $tabHref = '<a  href="#menu' . $item->id . '"  
                            onclick="changeArea(\' ' . $item->description . ' , ' . $item->title . ' \' )" >
                           <input type="radio" class="radio" name="' . $radioName . '" id="' . $item->id . '">
                                  <label for="' . $item->id . '"> ' . $item->title . '</label>
                       </a>';

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
//                    echo $tabHref;

                }
            }
        }
        ?>
    </div>

    <div class="tab-content">
        <?php $tabContentIds = [];
        foreach ($items as $item) {
            $openTabPaneDiv = '<div id="menu' . $item->id . '" class="tab-pane fade">';

            $tabContent = '<h3>' . $item->title . '</h3> <p>' . $item->description . '</p>';

            $closeTabPaneDiv = '</div>';

            if (isset($checkSubItem) && isset($parentItem)) {//условие для контента субитемов(вложеных итемов)
                if ($item->parent_id == $parentItem->id) {//разные сравнения
                    echo $openTabPaneDiv;
                    echo $tabContent;
                    echo $closeTabPaneDiv;

                }

            } else {
                if ($item->regularity_id == $regularity->id && is_null($item->parent_id)) {//условие для контента итемов родителей
                    echo $openTabPaneDiv;
                    echo $tabContent;
                    echo $this->render('user-main-item', [  //рендер субитемов
                        'regularity' => $regularity,
                        'items' => $subItems,
                        'parentItem' => $item,
                        'checkSubItem' => true,
                    ]);
                    echo $closeTabPaneDiv;

                }
            }
        }
        ?>
    </div>
</div>








