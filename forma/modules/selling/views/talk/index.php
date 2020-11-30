<?php
$this->title = Yii::t('app', 'Выберите ответ на вопрос');
echo \forma\modules\selling\widgets\Dialog::widget([
    'model' => $model,
    'sellingId' => $sellingId,
    'customer' => $customer,
    'customAnswer' => $customAnswer,

]);