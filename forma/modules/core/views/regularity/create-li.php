<li class="<?= $id == $activeId ? 'active' : '' ?> ">
    <a href="#tab_<?= $addHrefName . '_' . $id ?>" data-toggle="tab"
       onclick="changeArea('<?= $description ?>', '<?= $nameOnPicture ?>', '<?= $picture ?>')">
        <?= $navBarName ?>
    </a>
</li>