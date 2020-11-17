<?php

use yii\helpers\Url;
use kartik\color\ColorInput;
use forma\modules\core\components\LinkHelper;

$this->title = 'Регламент';
Url::remember(['/core/regularity/regularity', 'user-name' => Yii::$app->user->identity->username]);
$publicRegularityUrl = Url::to((['/core/regularity/regularity', 'user-name' => Yii::$app->user->identity->username]));
?>
<a class="btn btn-success" href='<?= $publicRegularityUrl?>'
   style="float: right; text-align: right; padding-left: 5px;">
    <i class="fa fa-code"></i>
</a>

<!-- Вывод регламентов и их пунктов-->
<section class="content">
    <?php if ($regularitys): ?>

        <?= $this->render('regularity', [
            'regularitys' => $regularitys,
            'items' => $items,
            'order_id'=> $order_id
        ]);
        ?>

    <?php elseif (!$regularitys): ?>
        <h4>У вас нет регламентов, но вы можете их добавить пройдя по ссылке <br><br>
            <a href="/core/regularity/settings">Добавить регламент</a>
        </h4>
    <?php endif; ?>
</section>


<?php

$menu = Yii::$app->params['menu'];

?>

<h1>Эти функции можно использовать в регламенте для прямого запуска компонентов системы</h1>

<?php

foreach ($menu as $itemMain): ?>
    <div style="padding: 5px; border:1px solid #ccc;">
        <h2>

            <?= !empty($itemMain['icon']) ? '<i class="fa fa-' . $itemMain['icon'] . '"></i>' : '' ?>
            <?= !empty($itemMain['url']) ? '<a href="' . Url::to($itemMain['url']) . '">' : '' ?>
            <?= $itemMain['label'] ?>
            <?= !empty($itemMain['url']) ? '</a>' : '' ?>

            <?php echo LinkHelper::replaceUrlOnButton(' {{'.$itemMain['url'][0]. '||'. $itemMain['label'].'}}'); ?>

          <span class=""><?php LinkHelper::replaceUrlOnButton(" {{".Url::to($itemMain['url'])."||" .$itemMain['label']."}}") ?></span>
          <input style="font-size: 17px; width: 30%;" class="" value="{{<?= Url::to($itemMain['url']) ?>||<?= $itemMain['label'] ?>}}"/>


        </h2>

    </div>

<br>

    <?php if (!empty($itemMain['items'])) : $i = 0;
        foreach ($itemMain['items'] as $item): ?>

            <?php if ($i % 3 == 0): ?>
                <div class="row">
            <?php endif; ?>

            <div class="col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-<?= $item['icon']; ?>"></i></span>
                    <div class="info-box-content">


                        <span class=""><?php LinkHelper::replaceUrlOnButton(" {{".Url::to($item['url'])."||". $item['label']."}}") ?></span>
                      <br>                      <br>
                        <?php echo LinkHelper::replaceUrlOnButton(' {{'.$item['url'][0]. '||'. $item['label'].'}}'); ?>
                        <input style="width:100%" class=""
                                    value="{{<?= Url::to($item['url']) ?>||<?= $item['label'] ?>}}"/>
                    </div>
                </div>
            </div>

            <?php $i++;
            if ($i % 3 == 0 || $i == count($itemMain['items'])): ?>
                </div>
            <?php endif; ?>

        <?php endforeach; endif; ?>

<?php endforeach; ?>

<style>
    .nav-tabs li {
        border-top: 3px solid #ccc !important;
    }.nav-tabs li.active {
        border-top: 3px solid green !important;
    }
     a {
         color: green;
     }
    @media screen and (max-width: 768px) {
        .nav-tabs > a > i {
            width: 100px;
        }
    }
</style>