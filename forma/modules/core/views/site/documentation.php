<?php
    $docmap = [
        'object.php' => 'Раздел объектов',
    ]
?>


<?php if ($page) : ?>

<?= $this->render('docs/'.$page); ?>

<?php else: foreach (scandir(__DIR__.'/docs') as $file):
    if ($file == '.' || $file == '..') continue ?>

    <div class="col-md-12">
        <div class="box box-default collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title"><?=$docmap[$file]?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>

            <div class="box-body">
                <?php require __DIR__.'/docs/'.$file; ?>
            </div>
        </div>
    </div>

<?php endforeach; endif ?>