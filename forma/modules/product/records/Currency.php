<?php

namespace forma\modules\product\records;

use forma\components\AccessoryActiveRecord;
use forma\components\EntityLister;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "currency".
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property string $rate
 */
class Currency extends AccessoryActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'currency';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'code', 'rate'], 'required'],
            [['rate'], 'number'],
            [['name'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 3],
            [['code'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'code' => 'Код',
            'rate' => 'Ставка',
        ];
    }

    /**
     * @inheritdoc
     * @return CurrencyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CurrencyQuery(get_called_class());
    }

    /**
     * Returns array of ISO 4217 codes for drop down list.
     * 
     * @return array
     */
    public static function getList()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
        //todo: нужно давать доступы к стандартым валютам всем, либо добавлять валюты для каждого
        return EntityLister::getList(self::className());
    }
}
