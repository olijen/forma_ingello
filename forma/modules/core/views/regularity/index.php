<?php

//de($regularity =$dataProvider->getModels()[0]);
$regularitys = $dataProvider->getModels();
//de($regularitys[1]->items);

?>
<section class="content-header">
    <h1 align="center">
        Регламент </h1>

</section>


<section class="content">

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">


            <?php foreach ($regularitys as $regularity): ?>
                <li class="<?= $regularity['order'] == 1 ? 'active' : '' ?> ">
                    <a href="#tab_<?= $regularity['id'] ?>" data-toggle="tab"><?= $regularity['name'] ?></a>
                </li>
            <?php endforeach; ?>
        </ul>


        <div class="tab-content">

<!--            --><?php //foreach ($regularitys as $regularity): ?>
<!--                <div class="tab-pane --><?//= $regularity['order'] == 1 ? 'active' : '' ?><!--"-->
<!--                     id="tab_--><?//= $regularity['id'] ?><!--">-->
<!--                    --><?php //foreach ($regularity->items as $item): ?>
<!--                    --><?php //if ($item['parent_id'])?>
<!--                        <div class="panel box box-success">-->
<!--                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse_--><?//= $item['id']; ?><!--"-->
<!--                               class="collapsed" aria-expanded="false">-->
<!--                                --><?//= $item['title']; ?>
<!--                            </a>-->
<!---->
<!--                            <div id="collapse_--><?//= $item['id']; ?><!--" class="panel-collapse collapse"-->
<!--                                 aria-expanded="false">-->
<!--                                --><?//= $item['description']; ?>
<!--                                --><?php //if ($item['parent_id']): ?>
<!--                                <a data-toggle="collapse" data-parent="#accordion1"-->
<!--                                   href="--><?//= $item['parent_id'] != NULL ? '#capse_' . $item['id'] : 'а' ?><!--"-->
<!--                                   aria-expanded="false"-->
<!--                                   class="collapsed">-->
<!--                                    --><?//= $item['title']; ?>
<!--                                </a>-->
<!--                                --><?php //endif; ?>
<!--                                <div id="--><?//= $item['parent_id'] != NULL ? 'capse_' . $item['id'] : 'в' ?><!--"-->
<!--                                     class="panel-collapse collapse"-->
<!--                                     aria-expanded="true">-->
<!--                                    --><?//= $item['description']; ?>
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                                <div class="box-body">-->
<!--                                    <div class="box-group" id="accordion1">-->
<!---->
<!---->
<!--                                    </div>-->
<!--                                </div>-->
<!--                        </div>-->
<!--                    --><?php //endforeach; ?>
<!--                </div>-->
<!--            --><?php //endforeach; ?>


            <?php foreach ($regularitys as $regularity): ?>
            <div class="tab-pane <?= $regularity['order'] == 1 ? 'active' : '' ?>"
                 id="tab_<?= $regularity['id'] ?>">
                <?php foreach ($regularity->items as $item): ?>
                    <div class="box-body">
                        <?php if($item['parent_id'] == null):?>
                             <?= $item['title']; ?>
<!--                        --><?php //elseif($item['order']==1):?>
                    <?php elseif($item['order']==1):?>
                        <div>
                             <?=$item['title']?>
                        </div>
                 </div>
                <?php endif;?>
                <?php endforeach; ?>
            </div>
            <?php endforeach; ?>


        </div>
</section>
