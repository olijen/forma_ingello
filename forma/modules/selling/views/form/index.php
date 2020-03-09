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
 */

$this->title = 'Новая продажа от ' . Yii::$app->formatter->asDatetime($model->date_create, 'php:d.m.Y');
if ($model->date_complete) {
    $this->title .= ' до ' . Yii::$app->formatter->asDatetime($model->date_complete, 'php:d.m.Y');
}
$this->title .= ' (' . Yii::$app->getUser()->getIdentity()->username . ')';

$this->params['breadcrumbs'][] = ['label' => 'Продажи', 'url' => Url::to(['/selling/main'])];
$this->params['breadcrumbs'][] = $this->title;

?>

<?= SellingFormView::widget(compact('model')) ?>

<?php foreach ($userState as $key => $value):
    if ($sellingState):
        if ($value['id'] == $sellingState->id):?>
            <strong>  <?= $value['name'] ?> </a> </strong><br>
        <?php else: ?>
            <strong> <a href="/selling/form/test?id=<?= $model->id ?>&state_id=<?= $value['id'] ?>"><?= $value['name'] ?></a>
            </strong><br>
        <?php endif; ?>
    <?php else: ?>
        <strong> <a href="/selling/form/test?id=<?= $model->id ?>&state_id=<?= $value['id'] ?>"><?= $value['name'] ?></a>
        </strong><br>
    <?php endif; ?>
<?php endforeach; ?>

<?= Yii::$app->getModule('core')->getStateWidget(compact('model')) ?>

<?= NomenclatureView::widget(['sellingId' => $model->id]) ?>




