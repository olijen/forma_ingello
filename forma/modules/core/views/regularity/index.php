<?php

//de($regularity =$dataProvider->getModels()[0]);
$regularitys = $dataProvider->getModels();
//de($regularitys[1]->items);
//$data = [];
?>
<section class="content-header">
    <h1 align="center">
        Регламент </h1>

</section>


<section class="content">

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">


            <?php foreach ($regularitys as $regularity): ?>
                <li class="<?= $regularity['id'] == 1 ? 'active' : '' ?> ">
                    <a href="#tab_<?= $regularity['id'] ?>" data-toggle="tab"><?= $regularity['name'] ?></a>
                </li>
            <?php endforeach; ?>
        </ul>


        <div class="tab-content">

            <?php foreach ($regularitys as $regularity): ?>
                <div class="tab-pane <?= $regularity['id'] == 1 ? 'active' : '' ?>"
                     id="tab_<?= $regularity['id'] ?>">
                    <?php foreach ($regularity->items as $item) {
                        if ($item['parent_id'] != null) {
                            $data[] = $item;
                        }
                    }
                    ?>
                    <?php foreach ($regularity->items as $item): ?>
                        <?php if (is_null($item['parent_id'])): ?>
                            <div class="panel box box-danger">
                                <div class="panel box box-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                           href="#collapse_<?= $item['id'] ?>" class="collapsed"
                                           aria-expanded="false">
                                            <?= $item['title']; ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse_<?= $item['id'] ?>" class="panel-collapse collapse"
                                     aria-expanded="false"
                                     style="height: 0px;">
                                    <div class="box-body">
                                        <?= $item['description'] ?>
                                        <?php foreach ($data as $value): ?>
                                            <?php if ($value['parent_id'] == $item['id']): ?>
                                                <div class="panel box box-primary">
                                                    <div class="panel box box-primary">
                                                        <h4>
                                                            <a data-toggle="collapse" data-parent="#accordion"
                                                               href="#capse_<?= $value['id'] ?>" class="collapsed"
                                                               aria-expanded="false">
                                                                <?= $value['title']; ?>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="capse_<?= $value['id'] ?>" class="panel-collapse collapse"
                                                         aria-expanded="true">
                                                        <div class="box-body">
                                                            <?= $value['description']; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>

            <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
    </div>
</section>
