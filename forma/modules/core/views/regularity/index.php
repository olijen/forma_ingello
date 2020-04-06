<?php

use yii\helpers\Url;

$this->title = 'Регламент, правила';

function show($url, $text = "Открыть", $with = 600, $height = 600, $left = 600)
{
    if ($url{0} == '/') {
        if (false === strripos($url, '?')) {
            $url .= '?';
        } else {
            $url .= '&';
        }
        $url .= 'without-header';
    }
    //if ($url{0} == '/') {
    echo \forma\components\widgets\ModalSrc::widget([
        'route' => $url,
        'name' => $text,
        'icon' => 'eye',
        'color' => 'blue',
        'iframe' => true,
        'options' => [
            'class' => 'btn btn-primary btn-xs',
            'style' => ['border' => '1px solid green'],
            'id' => 'id' . time(),
        ]
    ]);
    return;
    //}
    ?>
    <a
            onclick="window.open('<?= $url ?>', 'Window', 'width=600,height=600,left=600')"
            class="btn btn-primary btn-xs ">
        <?= $text ?>
    </a>
    <?php
}

$regularitys = $dataProvider->getModels();
?>


<section class="content">

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">


            <?php foreach ($regularitys as $regularity): ?>
                <li class="<?= $regularity['order'] == 1 ? 'active' : '' ?> ">
                    <a href="#tab_<?= $regularity['id'] ?>" data-toggle="tab"><?= $regularity['name'] ?></a>
                </li>
            <?php endforeach; ?>
            <a href="/core/regularity/settings"><i class="fa fa-cog"></i></a>
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
                    <div class="row">
                        <?php foreach ($regularity->items as $item): ?>
                            <?php if (is_null($item['parent_id'])): ?>
                                <div class="panel box box-<?= $item['color'] ?>" style="margin-bottom: 5px">
                                    <div class="box-header with-border" style="margin-bottom: 5px">
                                        <h4 class="box-title">
                                            <a href="/core/item/update?id=<?= $item['id'] ?>"><i class="fa fa-edit"></i></a>
                                            <a href="/core/item/create?regularity_id=<?= $regularity['id'] ?>&parent_id=<?= $item['id'] ?>"><i
                                                        class="fa fa-plus"></i></a>
                                            <a href="/core/item/delet?id=<?= $item['id'] ?>"><i class="fa fa-trash"></i></a>
                                            <a data-toggle="collapse" data-parent="#accordion"
                                               href="#collapse_<?= $item['id'] ?>" class="collapsed"
                                               aria-expanded="false">
                                                <?= $item['title']; ?>
                                            </a>

                                        </h4>
                                    </div>
                                    <div id="collapse_<?= $item['id'] ?>" class="panel-collapse collapse"
                                         aria-expanded="false">
                                        <div class="box-body">
                                            <?= $item['description'] ?>

                                            <?php foreach ($data as $value): ?>
                                                <?php if ($value['parent_id'] == $item['id']): ?>
                                                    <div class="box-body">
                                                        <div class="box-group" id="accordion1">
                                                            <div class="panel box box-primary">
                                                                <div class="box-header with-border">
                                                                    <h4 class="box-title">
                                                                        <a href="/core/item/update?id=<?= $value['id'] ?>"><i
                                                                                    class="fa fa-edit"></i></a>
                                                                        <a href="/core/item/delet?id=<?= $value['id'] ?>"><i
                                                                                    class="fa fa-trash"></i></a>
                                                                        <a data-toggle="collapse"
                                                                           data-parent="#accordion"
                                                                           href="#capse_<?= $value['id'] ?>"
                                                                           class="collapsed"
                                                                           aria-expanded="false">
                                                                            <?= $value['title']; ?>
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                                <div id="capse_<?= $value['id'] ?>"
                                                                     class="panel-collapse collapse"
                                                                     aria-expanded="true">
                                                                    <div class="box-body">
                                                                        <?= $value['description']; ?>
                                                                    </div>
                                                                </div>
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
                    <a href="/core/item/create?regularity_id=<?= $regularity['id'] ?>"><i class="fa fa-plus"></i>Добавить
                        пункт</a>
                </div>
            <?php endforeach; ?>

            <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
    </div>
</section>
<br><br><br><br><br><br>

