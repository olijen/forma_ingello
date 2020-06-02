<?php

namespace forma\modules\product\records;

use forma\components\EntityLister;
use Yii;

/**
 * This is the model class for table "field".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $widget
 * @property string $name
 *
 * @property Category $category
 * @property FieldProductValue[] $fieldProductValues
 * @property FieldValue[] $fieldValues
 */
class Field extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'field';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'widget', 'name'], 'required'],
            [['category_id'], 'integer'],
            [['widget', 'name', 'defaulted'], 'string', 'max' => 55]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Категория(id)',
            'widget' => 'Тип',
            'name' => 'Название',
            'defaulted' => 'Значения по умолчанию'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFieldProductValues()
    {
        return $this->hasMany(FieldProductValue::className(), ['field_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFieldValues()
    {
        return $this->hasMany(FieldValue::className(), ['field_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return FieldQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FieldQuery(get_called_class());
    }

    public function getValuesForProduct($product_id)
    {

        return FieldProductValue::find()
            ->where(['field_id' => $this->id])
            ->andWhere(['product_id' => $product_id])
            ->one();
    }

    public static function getList()
    {
        return EntityLister::getList(self::className());
    }

    public function widgetGetList($categoriesId)
    {
        $query = Field::find()
            ->indexBy('id');
        foreach ($categoriesId as $categoryId) {
            $query->orWhere(['category_id' => $categoryId]);
        }

        $query = $query->all();

        return $query;
    }
}
