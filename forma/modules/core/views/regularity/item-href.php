
<?php
//de($radioName);
?>
<a  href="#menu<?= $item->id ?>"  onclick="changeArea()" >
    <input type="radio" class="radio" name=<?= $radioName ?> id="<?= $item->id ?>">
    <label for="<?= $item->id ?>"> <?= $item->title ?> </label>
</a>
