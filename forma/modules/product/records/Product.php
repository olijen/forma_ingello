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
 * @property integer $type_id
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
 * @property Type $type
 */
class Product extends AccessoryActiveRecord
{
    const WINE_TYPE_ID = 1;
    const BOOZE_TYPE_ID = 2;

    const REF_ID = 0;
    const NRF_ID = 1;
    public $categoriesId = [];
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
            [['sku', 'name',], 'required'],
            [['category_id', 'manufacturer_id', 'parent_id'], 'integer'],
            [['note'], 'string'],
            [['rating'], 'number'],
            [['sku', 'name'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['manufacturer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Manufacturer::className(), 'targetAttribute' => ['manufacturer_id' => 'id']],
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
            'rating' => 'Рейтинг',
            'parent_id' => 'Родитель',

        ];
    }

    private function getParentCategoryId(int $category_id)
    {
        if (is_int($category_id)) {
            if (in_array($category_id, $this->categoriesId) !== true) {
                $this->categoriesId[] = $category_id;
            }
            $categories = Category::find()->where(['parent_id' => $category_id])->all();
            $defultParent = Category::find()->where(['id'=>$category_id])->select('parent_id')->one();
            if($defultParent!=null){
                $this->categoriesId[] = $defultParent->parent_id;
            }
            foreach ($categories as $category) {
                $this->categoriesId[] = $category->id;
            }
        }
    }

    public function getCategoriesId(int $category_id)
    {
        $this->getParentCategoryId($category_id);
        foreach ($this->categoriesId as $key => $item) {
            if ($item[$key] !== null) {
                $category = Category::find()->where(['parent_id' => $item[$key]])->all();
                foreach ($category as $value) {
                    if ($value->parent_id == $item[$key] || $item[$key]==$value->parent_id) {
                        $this->categoriesId[] = $value->id;
                    }
                }
                $this->getCategoriesId($item[$key++]);
            }
        }
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

    public function getWarehouseProducts()
    {
        return $this->hasMany(WarehouseProduct::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getFieldProductValues()
    {
        return $this->hasMany(FieldProductValue::className(), ['product_id' => 'id']);
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

    public static function getListQuery()
    {
        return EntityLister::getListQuery(self::className());
    }

    public function getFieldProductValue($id, $field)
    {
        $fieldProductValue = FieldProductValue::find()
            ->where(['field_id' => $field->id])
            ->andWhere(['product_id' => $id])
            ->one();

        if ($field->widget === 'widgetDropDownList') {
            $dropDownListValueId = $fieldProductValue['value'];
            $fieldValue = FieldValue::findOne($dropDownListValueId);
//            de($fieldValue->name);  // TODO выдает ошибку Trying to get property 'name' of non-object
//            \Yii::debug($fieldValue);
            return $fieldValue['name']; // TODO почему не выводиться как свойство обьекта?
        }

        if ($fieldProductValue) {
            return $fieldProductValue->value;
        }

        return false;
    }

    public static function getAllFieldProductValue()
    {

        $allFieldProductValue = FieldProductValue::find()->joinWith(['field'])->all();

        foreach ($allFieldProductValue as $DropDownList) {
            if ($DropDownList->field->widget == 'widgetDropDownList' && !empty($DropDownList->value)) {
                foreach ($DropDownList->field->fieldValues as $fieldValue) {
                    if ($DropDownList->value == $fieldValue->id) {
                        $DropDownList->value = $fieldValue->name;
                    }
                }
            }
        }

        foreach ($allFieldProductValue as $MultiSelect) {
            if ($MultiSelect->field->widget == 'widgetMultiSelect' && !empty($MultiSelect->value)) {
                $MultiSelect->value = json_decode($MultiSelect->value);
                $MultiSelectValues = [];
                if (!empty($MultiSelect->value)) {
                    Yii::debug('$MultiSelect->value');
                    Yii::debug($MultiSelect->value);
                    foreach ($MultiSelect->value as $multiSelectId) {
                        foreach ($MultiSelect->field->fieldValues as $fieldValue) {
                            if ($multiSelectId == $fieldValue->id) {
                                $MultiSelectValues [] = $fieldValue->name;
                            }
                        }
                    }
                    $MultiSelect->value = $MultiSelectValues;
                }
            }
        }

        return $allFieldProductValue;
    }

}
