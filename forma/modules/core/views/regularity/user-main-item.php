<?php use forma\modules\core\components\LinkHelper;

//if ($item->regularity_id == $regularity->id && is_null($item->parent_id)):
$dataDateCount = '2010-09-02';
$timeChange = 100400;
$y = 1;

?>

<div class="cd-horizontal-timeline loaded">
    <div class="timeline">
        <div class="events-wrapper">
            <div class="events">
                <ol>
                    <?php foreach ($items as $key => $item): ?>
                        <?php if ($item->regularity_id == $regularity->id & is_null($item->parent_id)): ?>
                            <?php $dataDateCount = date('Y-m-d', strtotime($dataDateCount) + $timeChange); ?>
                            <li>
                                <a href="#0" data-date="<?= $dataDateCount ?>"
                                   style="left: <?= 120 * $y++ ?>px;">
                                    <?= $item->title; ?>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>

                </ol>
                <span class="filling-line" aria-hidden="true"></span>
            </div>
        </div>
        <!-- .events-wrapper -->
        <ul class="cd-timeline-navigation">
            <li><a href="#0" class="prev inactive">Prev</a></li>
            <li><a href="#0" class="next">Next</a></li>
        </ul>
        <!-- .cd-timeline-navigation -->
    </div>

    <!-- .timeline -->
    <div class="events-content" style="height: 225px;">
        <?php $dataDateCount = '2010-09-02'; ?>
        <ol>
            <?php foreach ($items as $key => $item): ?>
            <?php if ($item->regularity_id == $regularity->id & is_null($item->parent_id)): ?>
                <?php $dataDateCount = date('Y-m-d', strtotime($dataDateCount) + $timeChange); ?>
                <li class="" data-date="<?= $dataDateCount ?>">
                    <p>
                        <?php  echo $item->id.' '.$item->title.' main-item'; ?>
                    </p>

                        <?= $this->render('user-sub-item', [
                            'regularity' => $regularity,
                            'items' => $items,
                            'subItems' => $subItems,
                        ]) ?>

                </li>
            <?php endif;?>
            <?php endforeach; ?>
        </ol>
    </div>
</div>









