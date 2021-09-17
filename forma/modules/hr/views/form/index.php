<?php

use forma\modules\core\components\LinkHelper;
use forma\modules\hr\records\interview\Interview;
use forma\modules\hr\widgets\SellingFormView;
use forma\modules\hr\widgets\NomenclatureView;
use yii\helpers\Url;

/**
 * @var $model Interview
 */

$this->title = 'Новый найм от ' . Yii::$app->formatter->asDatetime($model->date_create, 'php:d.m.Y');
if ($model->date_complete) {
    $this->title .= ' до ' . Yii::$app->formatter->asDatetime($model->date_complete, 'php:d.m.Y');
}
$this->title .= ' (' . Yii::$app->getUser()->getIdentity()->username . ')';
$this->params['homeLink'] = ['label' => 'Панель упраления', 'url' => '/hr', 'title' => 'Панель управления модулем найма'];
$this->params['breadcrumbs'][] = ['label' => 'Найм', 'url' => Url::to(['/hr/main'])];



?>

<?= SellingFormView::widget(compact('model')) ?>
<div class="bs-example">
    <div class="detached-block-example" style="margin-bottom: 10px">Состояние <?php echo LinkHelper::replaceUrlOnButton(" {{" . Url::to('/hr/interview-state' . "||" . " Изменить состояния" . "}}"), 'dot-circle');?></div>

    <div class="operation-states" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-12">
                    <div class="state-button highlight-addon field-selling-state">
                        <?php foreach ($userState as $key => $value): ?>
                            <?php if ($interviewState): ?>
                                <?php if ($interviewState->id == $value['id']):
                                    $description = $value;?>
                                    <a href="/hr/main" class="btn btn-success active"
                                           style="outline: none;"> <?= $value['name'] ?> </a>
                                <?php else: ?>
                                    <label href="/hr/main" class="btn btn-success disabled"
                                           style="outline: none;"> <?= $value['name'] ?> </label>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <div class="help-block"></div>
                    </div>
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
                    <?php if ($interviewState): ?>
                        <?php foreach ($userState as $state): ?>
                        <?php if ($state->id !== $interviewState->id):?>
                            <a class="btn btn-success no-loader btn-xs"
                               href="/hr/form/save?id=<?= $model->id ?>&state_id=<?= $state->id ?>">
                                <?= $state->name ?>
                            </a>
                        <?php endif;?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <?php foreach ($userState as $key => $value): ?>
                            <a class="btn btn-success btn-xs"
                               href="/hr/form/save?id=<?= $model->id ?>&state_id=<?= $value['id'] ?>">
                                <?= $value['name'] ?>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

