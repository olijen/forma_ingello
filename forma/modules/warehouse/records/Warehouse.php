<?php

namespace forma\modules\warehouse\records;

use forma\modules\inventorization\records\Inventorization;
use Yii;
use yii\helpers\ArrayHelper;
use forma\modules\country\records\Country;

/**
 * This is the model class for table "warehouse".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property integer $country_id
 *
 * @property Inventorization[] $inventorizations
 * @property Purchase[] $purchases
 * @property Selling[] $sellings
 * @property Transit[] $transits
 * @property Transit[] $transits0
 * @property WarehouseUser[] $warehouseUsers
 * @property WarehouseProduct[] $warehouseProducts
 * @property Country $country
 */
class Warehouse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'warehouse';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
            [['address'], 'string', 'max' => 255],
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
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventorizations()
    {
        return $this->hasMany(Inventorization::className(), ['warehouse_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchases()
    {
        return $this->hasMany(Purchase::className(), ['warehouse_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSellings()
    {
        return $this->hasMany(Selling::className(), ['warehouse_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransits()
    {
        return $this->hasMany(Transit::className(), ['from_warehouse_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransits0()
    {
        return $this->hasMany(Transit::className(), ['to_warehouse_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWarehouseUsers()
    {
        return $this->hasMany(WarehouseUser::className(), ['warehouse_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWarehouseProducts()
    {
        return $this->hasMany(WarehouseProduct::className(), ['warehouse_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return WarehouseQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WarehouseQuery(get_called_class());
    }

    public static function getList($byUser = true)
    {
        $query = self::find();
        if ($byUser) {
            $query->joinWith(['warehouseUsers'], false, 'INNER JOIN')
                ->where(['user_id' => Yii::$app->user->id]);
        }
        return ArrayHelper::map($query->all(), 'id', 'name');
    }
    
    public function getProductsList()
    {
        $products = WarehouseProduct::find()
            ->joinWith('product', true, 'INNER JOIN')
            ->where(['warehouse_product.warehouse_id' => $this->id])
            ->all();

        return ArrayHelper::map($products, 'product.id', 'product.name');
    }

    public function belongsToUser()
    {
        return WarehouseUser::find()->where([
            'warehouse_id' => $this->id,
            'user_id' => Yii::$app->user->id,
        ])->exists();
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        $warehouseUser = new WarehouseUser();
        $warehouseUser->warehouse_id = $this->id;
        $warehouseUser->user_id = Yii::$app->user->id;
        $warehouseUser->save();
    }
}
