<?php

namespace forma\modules\hr\records\strategy;

use forma\components\AccessoryActiveRecord;
use forma\components\EntityLister;
use Yii;

/**
 * This is the model class for table "strategy".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 *
 * @property RequestStrategy[] $requestStrategies
 * @property Requests[] $requests
 */
class Strategy extends AccessoryActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'strategy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequestStrategies()
    {
        return $this->hasMany(RequestStrategy::className(), ['strategy_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Requests::className(), ['id' => 'request_id'])->viaTable('request_strategy', ['strategy_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return StrategyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StrategyQuery(get_called_class());
    }


    public static function getList() {
        return EntityLister::getList(self::className());
    }

}
