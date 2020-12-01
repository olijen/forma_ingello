<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <?php use yii\helpers\Url;
        foreach ($regularitys as $regularity): ?>
            <li class="regularity <?= $regularity['id'] == $order_id ? 'active' : '' ?>" style="padding-bottom: 5px; padding-top:5px;
                ">
                <div style="">
                    <a title="Удалить регламент"  href="/core/regularity/delete?id=<?= $regularity['id'] ?>" onclick="return confirm('Вы уверены, что хотите удалить регламент и все пункты?')">
                        <i class="fa fa-trash" style="; font-size: 20px; padding: 3px; padding-left: 5px;"></i>
                    </a>
                    <a title="Изменить регламент" href="/core/regularity/update?id=<?= $regularity['id'] ?>"><i class="fa fa-edit" style="; font-size: 20px; padding: 3px;"></i></a>
                    <a title="Смотреть пункты регламента"  href="#tab_<?= $regularity['id'] ?>" data-toggle="tab" style="width: 80%; padding-top:  10px; padding-right: 10px;" aria-expanded="false">
                        <?= $regularity['name'] ?>
                    </a>
                </div>
            </li>
        <?php endforeach; ?>
        <a href="/core/regularity/create">
            <i title="Добавить регламент" class="regularity-action fa fa-plus" style="font-size: 35px; border: 1px solid green; border-radius: 50%; padding: 10px;"></i>
        </a>
        <a class="regularity-action" href='<?= Url::to((['/core/regularity/regularity', 'user-name' => Yii::$app->user->identity->username]));?>'>
            <i title="Смотреть презентацию" class="regularity-action fa fa-image" style="font-size: 35px; border: 1px solid green; border-radius: 50%; padding: 10px;"></i>
        </a>
    </ul>

    <div class="tab-content">
        <?php foreach ($regularitys as $regularity): ?>
            <div class="tab-pane <?= $regularity['id'] == $order_id ? 'active' : '' ?>"
                 id="tab_<?= $regularity['id'] ?>">

                <?php foreach ($regularity->items as $item) {
                    if ($item['parent_id'] != null) {
                        $items[] = $item;
                    }
                }
                ?>

                <?= $this->render('main_item', [
                    'regularity' => $regularity,
                    'items' => $items,
                ]) ?>

                <a href="/core/item/create?regularity_id=<?= $regularity['id'] ?>">
                    <i class="fa fa-plus"></i>
                    Добавить пункт
                </a>
                <!-- /.tab-pane -->
            </div>
        <?php endforeach; ?>
        <!-- /.tab-pane -->
    </div>

</div>
