<?php

namespace forma\modules\product\records;

use forma\components\AccessoryActiveRecord;
use forma\components\EntityLister;
use forma\modules\country\records\Country;

/**
 * This is the model class for table "manufacturer".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property integer $country_id
 *
 * @property Product[] $products
 * @property Country $country
 */
class Manufacturer extends AccessoryActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'manufacturer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'address'], 'string', 'max' => 100],
            [['country_id'], 'integer'],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'id']],
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
            'address' => 'Адрес',
            'country_id' => 'Страна',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['manufacturer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    /**
     * @inheritdoc
     * @return ManufacturerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ManufacturerQuery(get_called_class());
    }

    public static function getList()
    {
        return EntityLister::getList(self::className());
    }

    public static function getLocations()
    {
        $locations = [];

        foreach (self::find()->all() as $manufacturer) {
            $locations[] = [
                'location' => [
                    'country' => $manufacturer->country ? $manufacturer->country->name : null,
                    'address' => $manufacturer->address,
                ],
                'htmlContent' => "<h4><a href='/product/manufacturer/update?id={$manufacturer->id}'>{$manufacturer->name}</a> {$manufacturer->address}</h4>",
            ];
        }

        return $locations;
    }
}
