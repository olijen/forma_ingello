<?php
use forma\modules\core\components\LinkHelper;

foreach ($items as $value): ?>
    <?php if ($value['parent_id'] == $item['id']): ?>
        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
        <div class="panel box box-primary"
             style="margin-bottom: 5px; border-top-color: <?= $value['color'] ?>">
            <div class="box-header with-border"
                 style="margin-bottom: 5px">
                <h4 class="box-title">
                    <a href="/core/item/update?id=<?= $value['id'] ?>">
                        <i class="fa fa-edit"></i></a>
                    <a href="/core/item/delet?id=<?= $value['id'] ?>">
                        <i class="fa fa-trash"></i></a>

                    <a data-toggle="collapse"
                       data-parent="#accordion_<?= $item['id'] . $item['regularity_id'] ?>"
                       href="#collapse_<?= $value['id'] ?>"
                       class="collapsed"
                       aria-expanded="false">
                        > <?= $value['title']; ?>
                    </a>
                </h4>
            </div>
            <div id="collapse_<?= $value['id'] ?>"
                 class="panel-collapse collapse"
                 aria-expanded="false"
                 style="height: 0px;">
                <div class="box-body">
                    <?php echo LinkHelper::replaceUrlOnButton($value['description']); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; ?>