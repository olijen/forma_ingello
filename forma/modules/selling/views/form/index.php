<?php

use forma\modules\selling\records\selling\Selling;
use forma\modules\selling\widgets\SellingFormView;
use forma\modules\selling\widgets\NomenclatureView;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;


/**
 * @var $model Selling
 * @var $sellingState
 * @var $userState
 * @var $toState
 */

$this->title = 'Новая продажа от ' . Yii::$app->formatter->asDatetime($model->date_create, 'php:d.m.Y');
if ($model->date_complete) {
    $this->title .= ' до ' . Yii::$app->formatter->asDatetime($model->date_complete, 'php:d.m.Y');
}
$this->title .= ' (' . Yii::$app->getUser()->getIdentity()->username . ')';

$this->params['breadcrumbs'][] = ['label' => 'Продажи', 'url' => Url::to(['/selling/main'])];

$description= null;

?>


<?= SellingFormView::widget(compact('model')) ?>



<div class="bs-example">
    <div class="detached-block-example">Состояние</div>

    <div class="operation-states">
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
                    <a class="btn btn-success btn-xs"
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

        <div class="row selling_link">
            <div class="col-md-12">
                <h3>Ссылка на страницу продажи</h3>
                <a class="btn btn-success" href="http://<?=$_SERVER['HTTP_HOST']?>/selling/main/show-selling?selling_token=<?=$model->selling_token?>">Ссылка</a>
            </div>
        </div>

    </div>

</div>


<?= NomenclatureView::widget(['sellingId' => $model->id]) ?>









