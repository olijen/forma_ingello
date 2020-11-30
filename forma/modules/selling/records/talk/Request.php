<?php

namespace forma\modules\selling\records\talk;

use forma\components\AccessoryActiveRecord;
use forma\modules\selling\records\talk\RequestQuery;
use Yii;

/**
 * This is the model class for table "requests".
 *
 * @property int $id
 * @property string $text
 * @property int $is_manager
 *
 * @property \forma\modules\selling\records\talk\Answer[] $answers
 * @property RequestStrategy[] $requestStrategies
 * @property Strategy[] $strategies
 */
class Request extends AccessoryActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['is_manager'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'text' => Yii::t('app', 'Текст вопроса'),
            'is_manager' => Yii::t('app', 'Вопрос от менеджера'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswers()
    {
        return $this->hasMany(Answer::className(), ['request_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequestStrategies()
    {
        return $this->hasMany(RequestStrategy::className(), ['request_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStrategies()
    {
        return $this->hasMany(Strategy::className(), ['id' => 'strategy_id'])->viaTable('request_strategy', ['request_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \forma\modules\selling\records\talk\RequestQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RequestQuery(get_called_class());
    }
}
