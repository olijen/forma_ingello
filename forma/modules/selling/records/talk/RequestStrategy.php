<?php

namespace forma\modules\selling\records\talk;

use forma\modules\selling\records\talk\RequestStrategyQuery;
use Yii;

/**
 * This is the model class for table "request_strategy".
 *
 * @property int $request_id
 * @property int $strategy_id
 *
 * @property Strategy $strategy
 * @property Request $request
 */
class RequestStrategy extends \yii\db\ActiveRecord
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
            [['request_id', 'strategy_id'], 'safe'],
            [['request_id', 'strategy_id'], 'integer'],
            [['request_id', 'strategy_id'], 'unique', 'targetAttribute' => ['request_id', 'strategy_id']],
            [['strategy_id'], 'exist', 'skipOnError' => true, 'targetClass' => Strategy::className(), 'targetAttribute' => ['strategy_id' => 'id']],
            [['request_id'], 'exist', 'skipOnError' => true, 'targetClass' => Request::className(), 'targetAttribute' => ['request_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'request_id' => Yii::t('app', 'Request ID'),
            'strategy_id' => Yii::t('app', 'Strategy ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStrategy()
    {
        return $this->hasOne(Strategy::className(), ['id' => 'strategy_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequest()
    {
        return $this->hasOne(Request::className(), ['id' => 'request_id']);
    }

    /**
     * {@inheritdoc}
     * @return \forma\modules\selling\records\talk\RequestStrategyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RequestStrategyQuery(get_called_class());
    }
}
