<?php

use forma\modules\core\components\LinkHelper;
use forma\modules\selling\records\selling\Selling;
use forma\modules\selling\widgets\SellingFormView;
use forma\modules\selling\widgets\NomenclatureView;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/**
 * @var $model Selling
 * @var $sellingState
 * @var $userState
 * @var $toState
 */

$this->title = 'Коммуникация';
$this->params['breadcrumbs'][] = ['label' => 'Продажи', 'url' => Url::to(['/selling/main'])];

$description= null;

?>


<?= SellingFormView::widget(compact('model')) ?>

<?php if (!empty($_GET['id'])) : ?>
    <?php Pjax::begin([
        'id' => 'selling-state-pjax',
        'enablePushState' => false,
        'enableReplaceState' => false,
    ]) ?>
    <div class="bs-example">
        <div class="detached-block-example" style="margin-bottom: 10px">Состояние <?php echo LinkHelper::replaceUrlOnButton(" {{" . Url::to('/selling/main-state' . "||" . " Изменить состояния" . "}}"), 'dot-circle');?></div>

        <div class="operation-states" style="margin-top: 20px;">
            <div class="row">
                <div class="col-md-12">
                    <form id="w1" class="form-vertical" action="/selling/form?id=47" method="post" role="form">
                        <div class="state-button highlight-addon field-selling-state" successcssclass="">
                            <?php foreach ($userState as $key => $value): ?>
                                <?php if ($sellingState): ?>
                                    <?php if ($value['id'] == $sellingState->id):
                                        $description = $value;?>
                                        <label class="btn btn-success active"
                                               style="outline: none;"> <?= $value['name'] ?> </label>
                                    <?php else: ?>
                                        <label class="btn btn-success disabled"
                                               style="outline: none;"> <?= $value['name'] ?> </label>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <label class="btn btn-success disabled"
                                           style="outline: none;"> <?= $value['name'] ?> </label>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <div class="help-block"></div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <?php if ($description['description']):?>
                        <p><?= $description['description'];?></p>
                    <?php else: ?>
                        <p>Вы не указывали описание</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row operation-actions">
                <div class="col-md-12">
                    <?php if ($sellingState): ?>
                        <?php foreach ($toState as $value): ?>
                            <a class="btn btn-success no-loader btn-xs"
                               href="/selling/form/test?id=<?= $model->id ?>&state_id=<?= $value->toState->id ?>">
                                <?= $value->toState->name ?>
                            </a>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <?php foreach ($userState as $key => $value): ?>
                            <a class="btn btn-success btn-xs"
                               href="/selling/form/test?id=<?= $model->id ?>&state_id=<?= $value['id'] ?>">
                                <?= $value['name'] ?>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
    <?php Pjax::end(); ?>
<?php endif ?>

<?= NomenclatureView::widget(['sellingId' => $model->id]) ?>
