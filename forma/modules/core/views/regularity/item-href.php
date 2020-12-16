<?php

use forma\modules\core\components\LinkHelper;

if (is_null($item->picture)) {
    $item->picture = 'false';
}

$parentItemStr = isset($parentItem) ? $parentItem->title . '<br>' : '' . '<br>';

$dataName = '<h2 class=\'h-text\'>' . $regularity->name . '</h2>';

if (isset($parentItem)) {
    $dataName = $dataName . '<h3 class=\'h-text\'>' . $parentItem->title . '</h3>' . '<h4 class=\'h-text\'>' . $item->title . '</h4>';
} else {
    $dataName = $dataName . '<h3 class=\'h-text\'>' . $item->title . '</h3>';
}
?>
<div class="carousel-child">
    <a href="#menu<?= $item->id ?>"
       data-href="menu<?= $item->id ?>"
       data-name="<?= $dataName ?>"
       data-picture="<?= $item->picture ?>"
       class="change-item"
       style="display: flex;
              flex-direction: column-reverse;"
    >
        <label class="container-label" style="border: 1px solid #3c8dbc; border-radius: 15px; margin-right: 5px; margin-left: 2px; display: inline-block;">
            <input type="radio" class="check-radio" name=<?= $radioName ?> id="<?= $item->id ?>">
            <span class="checkmark"></span>

            <label style="font-size: 15px; margin-right: 10px;"> <?= $item->title ?> </label>
        </label>

        <div class="hidden-description" data-id="<?= $item->id ?>" style="visibility: hidden; display: none;">
            <?= $item->description ?>
        </div>
    </a>
</div>