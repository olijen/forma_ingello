

<?php $dataDateCount = '2015-09-02';
$timeChange = 100400;
$y = 1;

?>

<div class="cd-horizontal-timeline loaded">
    <div class="timeline">
        <div class="events-wrapper">
            <div class="events">
<!--                <ul>-->
                    <?php foreach ($items as $key => $item): ?>
                        <!--                        --><?php //if ($item->regularity_id == $regularity->id ): ?>
                        <?php $dataDateCount = date('Y-m-d', strtotime($dataDateCount) + $timeChange); ?>
<!--                        <li>-->
                            <a href="#0" data-date="<?= $dataDateCount ?>"
                               class="<?= $items[0] === $item ? 'selected' : ''; ?>"
                               style="left: <?= 120 * $y++ ?>px;">
                                <?= $item->title.'sub-item+++'; ?>
                            </a>
<!--                        </li>-->
                        <!--                        --><?php //endif; ?>
                    <?php endforeach; ?>

<!--                </ul>-->
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
    <div class="events-content" >
        <?php $dataDateCount = '2010-09-02'; ?>
        <ul>
            <?php foreach ($items as $key => $item): ?>
                <?php $dataDateCount = date('Y-m-d', strtotime($dataDateCount) + $timeChange); ?>
                <li class="" data-date="<?= $dataDateCount ?>">
                    <p>
                        <?php echo 'wdasdvxf';// $item->title; ?>

                    </p>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>