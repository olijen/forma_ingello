<?php

namespace forma\modules\selling\records\requeststrategy;

use forma\components\AccessoryActiveRecord;
use forma\modules\selling\records\strategy\Strategy;
use forma\modules\selling\records\talk\Request;
use Yii;

/**
 * This is the model class for table "request_strategy".
 *
 * @property int $request_id
 * @property int $strategy_id
 *
 * @property Requests $request
 * @property Strategy $strategy
 */
class RequestStrategy extends AccessoryActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request_strategy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['request_id', 'strategy_id'], 'required'],
            [['request_id', 'strategy_id'], 'integer'],
            [['request_id', 'strategy_id'], 'unique', 'targetAttribute' => ['request_id', 'strategy_id']],
            [['request_id'], 'exist', 'skipOnError' => true, 'targetClass' => Request::className(), 'targetAttribute' => ['request_id' => 'id']],
            [['strategy_id'], 'exist', 'skipOnError' => true, 'targetClass' => Strategy::className(), 'targetAttribute' => ['strategy_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'request_id' => Yii::t('app', 'Вопрос'),
            'strategy_id' => Yii::t('app', 'Стратегия'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequest()
    {
        return $this->hasOne(Request::className(), ['id' => 'request_id']);
    }

    public function getRequestText()
    {
        return $this->request->text;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStrategy()
    {
        return $this->hasOne(Strategy::className(), ['id' => 'strategy_id']);
    }

    public function getStrategyName()
    {
        return $this->strategy->name;
    }

    /**
     * {@inheritdoc}
     * @return RequestStrategyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RequestStrategyQuery(get_called_class());
    }
}
