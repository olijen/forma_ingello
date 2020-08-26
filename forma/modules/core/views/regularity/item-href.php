<a  href="#menu<?= $item->id ?>"
    onclick="changeArea()"
    data-description ="<?= $item->description ?> " data-name = "<?= 'Итемы: ' . $item->title ?>"
>
    <input type="radio" class="radio" name=<?= $radioName ?> id="<?= $item->id ?>">
    <label for="<?= $item->id ?>"> <?= $item->title ?> </label>
</a>
