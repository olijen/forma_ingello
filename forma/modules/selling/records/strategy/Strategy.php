<?php

namespace forma\modules\selling\records\strategy;

use forma\components\AccessoryActiveRecord;
use forma\components\EntityLister;
use forma\modules\selling\records\requeststrategy\RequestStrategy;
use forma\modules\selling\records\talk\Request;
use Yii;
use yii\helpers\ArrayHelper;

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
            [['is_selling'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Название'),
            'description' => Yii::t('app', 'Описание'),
        ];
    }

    public static function getList($byUser = null)
    {
        return EntityLister::getList(self::className(), $byUser);
    }

    public static function getListWithoutEmptyStrategy($byUser = null)
    {
        $query = \forma\modules\hr\records\strategy\Strategy::find()->joinWith(['accessory'])
            ->andWhere(['accessory.user_id'=> Yii::$app->user->id])
            ->andWhere(['accessory.entity_class' => Strategy::className()]);
        return ArrayHelper::map($query->all(), 'id', 'name');
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
}
