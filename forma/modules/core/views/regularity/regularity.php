< class="nav-tabs-custom">
    <ul class="nav nav-tabs" style="border: 1px solid silver;">
        <?php use yii\helpers\Url;
        foreach ($regularitys as $regularity): ?>
            <li class="regularity <?= $regularity['id'] == $order_id ? 'active' : '' ?>" style="padding-bottom: 5px; padding-top:5px;
                ">
                <div style="">
                    <a title="Удалить регламент"  href="/core/regularity/delete?id=<?= $regularity['id'] ?>" onclick="return confirm('Вы уверены, что хотите удалить регламент и все пункты?')">
                        <i class="fa fa-trash" style="; font-size: 20px; padding: 3px; padding-left: 5px;"></i>
                    </a>
                    <a title="Изменить регламент" href="/core/regularity/update?id=<?= $regularity['id'] ?>"><i class="fa fa-edit" style="; font-size: 20px; padding: 3px;"></i></a>
                    <a title="Смотреть пункты регламента" class="no-loader"  href="#tab_<?= $regularity['id'] ?>" data-toggle="tab" style="width: 80%; padding-top:  10px; padding-right: 10px;" aria-expanded="false">
                        <?= $regularity['name'] ?>
                    </a>
                </div>
            </li>
        <?php endforeach; ?>
        <a href="/core/regularity/create">
            <i title="Добавить регламент" class="regularity-action fa fa-plus" style="margin: 10px; font-size: 35px; border: 1px solid green; border-radius: 50%; padding: 10px;"></i>
        </a>
        <a class="regularity-action" href='<?= Url::to((['/core/regularity/regularity', 'user-name' => Yii::$app->user->identity->username]));?>'>
            <i title="Смотреть презентацию" class="regularity-action fa fa-image" style="margin: 10px; font-size: 35px; border: 1px solid green; border-radius: 50%; padding: 10px;"></i>
        </a>
        <li>

                <button  onclick="myFunction()" title="Копировать ссылку" class="regularity-action fa fa-copy" style="margin: 10px;
                font-size: 35px; border: 1px solid green;color: green; border-radius: 50%; padding: 10px;" ></button>
                <input style="width:100%" id='input_guestLink' type="hidden"
                       value="https://forma.ingello.com/core/regularity/regularity?userId=<?=Yii::$app->user->id?>"/>

        </li>

     </ul>

    <div class="tab-content" style="padding: 0;">
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
                    <i class="fa fa-plus" style="border: 1px solid green; border-radius: 50%;"></i>
                    (+) Добавить пункт
                </a>
                <!-- /.tab-pane -->
            </div>
        <?php endforeach; ?>
        <!-- /.tab-pane -->
    </div>

</div>

<style>
    #text-div {
        font-size: 25px;
    }
</style>

<script>
    function CopyToClipboard(containerid) {
        if (document.selection) {
            var range = document.body.createTextRange();
            range.moveToElementText(document.getElementById(containerid));
            range.select().createTextRange();
            document.execCommand("Copy");

        } else if (window.getSelection) {
            var range = document.createRange();
            range.selectNode(document.getElementById(containerid));
            window.getSelection().addRange(range);
            document.execCommand("Copy");
            alert("text copied")
        }}
</script>

<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        $('button.show-input').click(function () {
            $(this).hide();
            $($(this).attr('data-input')).attr('type', ' ');

        })
    })
</script>

<script>

    function myFunction() {
        let copyText = document.getElementById("input_guestLink");
        copyText.type = 'text';
        copyText.select();
        document.execCommand("copy");
        copyText.type = 'hidden';
        alert("Ссылка скопирована: " + copyText.value);
    }
</script>