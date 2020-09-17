<?php

use forma\modules\core\components\LinkHelper;

if (is_null($item->picture)) {
    $item->picture = 'false';
}

$parentItemStr = isset($parentItem) ? $parentItem->title . '<br>' : '';
$dataName = $regularity->name . '<br>' . $parentItemStr . $item->title;

?>
<div class="carousel-child">
    <a href="#menu<?= $item->id ?>"
       data-href="menu<?= $item->id ?>"
       data-description="<?= $item->description ?> "
       data-name="<?= $dataName ?>"
       data-picture="<?= $item->picture ?>"
       class="change-item"
       style="display: flex;
              flex-direction: column-reverse;"
    >

        <input type="radio" class="check-radio" name=<?= $radioName ?> id="<?= $item->id ?>"
               style="margin: 4px auto; top: 40px; display: inline-block;">
        <label for="<?= $item->id ?>"> <?= $item->title ?> </label>

    </a>
</div>