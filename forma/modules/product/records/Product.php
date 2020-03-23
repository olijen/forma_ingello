<?php

namespace forma\modules\product\records;

use forma\components\AccessoryActiveRecord;
use forma\components\EntityLister;
use Yii;
use forma\modules\warehouse\records\WarehouseProduct;
use yii\db\Exception;
use yii\helpers\ArrayHelper;
use forma\modules\country\records\Country;
use forma\modules\supplier\records\Supplier;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property integer $manufacturer_id
 * @property string $sku
 * @property string $name
 * @property string $note
 * @property double $volume
 * @property integer $year_chart
 * @property integer $batcher
 * @property string $rating
 * @property double $proof
 *
 * @property integer $country_id
 * @property integer $supplier_id
 * @property integer $color_id
 * @property integer $pack_unit_id
 * @property integer $parent_id
 *
 * @property Manufacturer $manufacturer
 * @property Category $category
 * @property Country $country
 * @property Color $color
 *
 * @property Product $parent
 * @property PackUnit $packUnit
 */
class Product extends AccessoryActiveRecord
{
    const WINE_TYPE_ID = 1;
    const BOOZE_TYPE_ID = 2;
    
    const REF_ID = 0;
    const NRF_ID = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_id', 'manufacturer_id', 'sku', 'name', 'volume', 'country_id'], 'required'],
            [['type_id', 'category_id', 'manufacturer_id', 'year_chart', 'batcher', 'country_id', 'color_id', 'volume', 'pack_unit_id', 'parent_id'], 'integer'],
            [['note'], 'string'],
            [['proof', 'rating'], 'number'],
            [['customs_code', 'sku', 'name'], 'string', 'max' => 255],

            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Type::className(), 'targetAttribute' => ['type_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['manufacturer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Manufacturer::className(), 'targetAttribute' => ['manufacturer_id' => 'id']],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'id']],
            [['color_id'], 'exist', 'skipOnError' => true, 'targetClass' => Color::className(), 'targetAttribute' => ['color_id' => 'id']],
            [['pack_unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => PackUnit::className(), 'targetAttribute' => ['pack_unit_id' => 'id']],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Категория',
            'manufacturer_id' => 'Производитель',
            'sku' => 'Артикул',
            'name' => 'Наименование',
            'note' => 'Примечание',
            'volume' => 'Объем',
            'color' => 'Цвет',
            'year_chart' => 'Год производства',
            'proof' => 'Крепость',
            'type_id' => 'Группа товаров',
            'customs_code' => 'Таможенный код',
            'batcher' => 'Дозатор',
            'rating' => 'Рейтинг',
            'country_id' => 'Страна',
            'color_id' => 'Цвет',
            'pack_unit_id' => 'Упаковка',
            'parent_id' => 'Родитель',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManufacturer()
    {
        return $this->hasOne(Manufacturer::className(), ['id' => 'manufacturer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getType()
    {
        return $this->hasOne(Type::className(), ['id' => 'type_id']);
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
    public function getSupplier()
    {
        return $this->hasOne(Supplier::className(), ['id' => 'supplier_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColor()
    {
        return $this->hasOne(Color::className(), ['id' => 'color_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPackUnit()
    {
        return $this->hasOne(PackUnit::className(), ['id' => 'pack_unit_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Product::className(), ['id' => 'parent_id']);
    }

    /**
     * @inheritdoc
     * @return ProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductQuery(get_called_class());
    }

    public static function getList()
    {
        return EntityLister::getList(self::className());
    }

    public function getBatcherLabel()
    {
        //todo: batcher может быть null? Вроде бы это бинарное значение - дозатор\не дозатор.
        // И есть такое слово разве?
        if (is_null($this->batcher)) {
            return null;
        }
        //todo: self::getBatcherList()?
        return ['ref', 'nrf'][$this->batcher];
    }


    public static function getBatchersList()
    {
        return [
            0 => 'ref',
            1 => 'nrf',
        ];
    }

    //todo: Это не относится к модели
    public static function getBatcherIdByLabel($label)
    {
        $ids = array_reverse(static::getBatchersList());
        return $ids[$label] ?? null;
    }

    //todo: Это не относится к модели
    public static function getVolumesList()
    {
        $centiliters =  [50, 70, 75, 100, 125, 150, 175, 200];

        $list = [];
        foreach ($centiliters as $volume) {
            $list[$volume] = $volume . 'cl (' . $volume / 100 . 'L)';
        }

        return $list;
    }

    public function getVolumeLabel()
    {
        if (!$this->volume) {
            return null;
        }
        return $this->volume . 'cl';
    }

    public function getQuantityInPack()
    {
        $quantity = ProductPackUnit::find()
            ->select(['pack_unit.bottles_quantity'])
            ->joinWith(['packUnit'])
            ->where(['product_pack_unit.product_id' => $this->id])
            ->orderBy('bottles_quantity ASC')
            ->limit(1)
            ->offset(1)
            ->column();

        return $quantity ? $quantity[0] . ' шт.' : null;

    }

    public function getPackUnits()
    {
        if ($this->getIsNewRecord()) {
            return [];
        }

        return ArrayHelper::getColumn(
            ProductPackUnit::find()->where(['product_id' => $this->id])->all(),
            'pack_unit_id'
        );
    }

    public function isOriginal()
    {
        return is_null($this->parent_id);
    }

    public function getOriginal()
    {
        return $this->parent_id ? static::findOne($this->parent_id) : $this;
    }

    public function getWarehouseProducts()
    {
        return $this->hasMany(WarehouseProduct::className(), ['product_id' => 'id']);
    }

    public function getPackUnitLabel()
    {
        $packUnit = $this->packUnit;
        if (!$packUnit) {
            return null;
        }
        return "{$packUnit->name} ({$packUnit->bottles_quantity} pc.)";
    }
    
    public function getSizeColumnValue()
    {
        if (!$this->volume) {
            return null;
        }
        if (!$this->packUnit) {
            return $this->volumeLabel;
        }
        return "{$this->packUnit->bottles_quantity}x{$this->volumeLabel}";
    }
}
