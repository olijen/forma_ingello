<?php

namespace forma\modules\product\records;

use forma\components\AccessoryActiveRecord;
use forma\components\EntityLister;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "pack_unit".
 *
 * @property integer $id
 * @property string $name
 * @property integer $bottles_quantity
 *
 * @property ProductPackUnit[] $productPackUnits
 * @property PurchaseProduct[] $purchaseProducts
 * @property SellingProduct[] $sellingProducts
 */
class PackUnit extends AccessoryActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pack_unit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'bottles_quantity'], 'required'],
            [['bottles_quantity', 'volume'], 'integer'],
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
            'bottles_quantity' => 'Количество бутылок',
            'volume' => 'Объем',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductPackUnits()
    {
        return $this->hasMany(ProductPackUnit::className(), ['pack_unit_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseProducts()
    {
        return $this->hasMany(PurchaseProduct::className(), ['pack_unit_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSellingProducts()
    {
        return $this->hasMany(SellingProduct::className(), ['pack_unit_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return PackUnitQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PackUnitQuery(get_called_class());
    }

    public static function getList()
    {
        $query = self::find()
            ->joinWith(['accessory'])
            ->andWhere(['accessory.user_id' => Yii::$app->getUser()->getIdentity()->getId()])
            ->andWhere(['accessory.entity_class' => self::className()])
            //->andWhere((['>', 'bottles_quantity', 0]))
        ;

        return ArrayHelper::map($query->all(), 'id', 'name');
    }

    public static function getListWithBottle()
    {
        return EntityLister::getList(self::className());
    }

    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['pack_unit_id' => 'id']);
    }
}
