<?php

use forma\modules\core\components\LinkHelper;

if (is_null($item->picture)) {
    $item->picture = 'false';
}

$parentItemStr = isset($parentItem) ? $parentItem->title . '<br>' : '' . '<br>';

$dataName = '<h2>' . $regularity->name . '</h2>';

if (isset($parentItem)) {
    $dataName = $dataName . '<h3>' . $parentItem->title . '</h3>' . '<h4>' . $item->title . '</h4>';
} else {
    $dataName = $dataName . '<h3>' . $item->title . '</h3>';
}
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

        <label class="container-label" style="margin: 4px auto; display: inline-block;">
            <input type="radio" class="check-radio" name=<?= $radioName ?> id="<?= $item->id ?>">
            <span class="checkmark"></span>
        </label>
        <label for="<?= $item->id ?>"> <?= $item->title ?> </label>

    </a>
</div>