<?php

namespace forma\modules\supplier\records;

use forma\components\AccessoryActiveRecord;
use forma\components\EntityLister;
use Yii;
use yii\helpers\ArrayHelper;
use forma\modules\country\records\Country;
use forma\modules\product\records\Product;

/**
 * This is the model class for table "supplier".
 *
 * @property integer $id
 * @property string $name
 * @property string $firm
 * @property string $contact_name
 * @property integer $country_id
 * @property string $address
 * @property string $email
 * @property double $tax_rate
 *
 * @property Country $country
 */
class Supplier extends AccessoryActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'supplier';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['tax_rate'], 'number'],
            [['name', 'firm', 'contact_name'], 'string', 'max' => 100],
            [['address', 'email'], 'string', 'max' => 32],
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
            'firm' => 'Фирма',
            'contact_name' => 'Контактное лицо',
            'country_id' => 'Страна',
            'address' => 'Адрес',
            'email' => 'E-mail',
            'tax_rate' => 'Налоговая ставка',
        ];
    }

    /**
     * @inheritdoc
     * @return SupplierQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SupplierQuery(get_called_class());
    }

    public static function getList()
    {
        return EntityLister::getList(self::className());
    }

    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    public static function getProductsList($supplierId)
    {
        $products = Product::find()
            ->where(['supplier_id' => $supplierId])
            ->all();

        return ArrayHelper::map($products, 'id', 'name');

    }
}
