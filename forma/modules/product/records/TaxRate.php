<?php

namespace forma\modules\product\records;

use forma\components\AccessoryActiveRecord;
use forma\components\EntityLister;
use Yii;

/**
 * This is the model class for table "tax_rate".
 *
 * @property integer $id
 * @property string $name
 * @property double $percent
 */
class TaxRate extends AccessoryActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tax_rate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['percent'], 'number'],
            [['name'], 'string', 'max' => 255],
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
            'percent' => 'Ставка, %',
        ];
    }

    /**
     * @inheritdoc
     * @return TaxRateQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TaxRateQuery(get_called_class());
    }

    public static function getList()
    {
        $list = [];
        $result = self::find()
            ->joinWith(['accessory'])
            ->andWhere(['accessory.user_id' => Yii::$app->getUser()->getIdentity()->getId()])
            ->andWhere(['accessory.entity_class' => self::class])
            ->all();

        foreach ($result as $rate) {
            $list[$rate->id] = "{$rate->name} ({$rate->percent}%)";
        }
        return $list;
    }
}
