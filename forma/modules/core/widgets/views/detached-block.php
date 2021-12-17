<style>
    .add-new-style-bs {
    <?= strval($style) ?>
    }
</style>
<div class="bs-sub-section">
        <?php if ($header): ?>
            <div class="page-header bs-header">
                <h3>
                    <a class="kv-anchor" title="" href="#">
                        <span class="glyphicon glyphicon-link"></span>
                    </a>
                    <?= $header ?>
                </h3>
            </div>
        <?php endif; ?>
    <div class="bs-example add-new-style-bs" >
        <div class="detached-block-example"><?= $example ?></div>
        <?= $content ?>
    </div>
</div>
