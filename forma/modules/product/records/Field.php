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
            'defaulted' => 'Значение по умолчанию'
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

    public static function getList()
    {
        return EntityLister::getList(self::className());
    }

    public function widgetGetList($modelParams = null)
    {


        if (is_array($modelParams)) {

//           de($productModel);
            $category_id = $modelParams['category_id'];
            var_dump($category_id);
//de($category_id);
//            $query = self::find()->join('INNER JOIN', 'field', 'field.id = field_product_value.field_id')
////                ->andwhere(['field_product_value.product_id' => $productModel->id])
//                ->andWhere(['field.category_id' => $category_id])
            $query = Field::find()
//                ->join('JOIN', 'field_product_value', 'field_product_value.field_id = field.id')
//                ->join('INNER JOIN', 'field_product_value', 'field.id = field_product_value.field_id')
//                ->andwhere(['field_product_value.product_id' => $productModel->id])
                ->andWhere(['category_id' => $category_id])
                ->indexBy('id')
                ->all();
//            de($query);

        } elseif (is_null($modelParams)) {
            de('Нулевая модель');
//            $query = self::find()->join('JOIN', 'field', 'field.id = field_product_value.field_id')
////                ->andwhere(['field_product_value.product_id' => $productModel->id])
//                ->andWhere(['field.category_id' => null])
//                ->indexBy('id')
//                ->all();
            de('field_product_valueModel');
//            $category_id = null;
        } else {
            var_dump('просто модель');
//            de($modelParams);
            $query = self::find()
//                ->join('JOIN', 'field_product_value', 'field_product_value.field_id = field.id')
//                ->andwhere(['field_product_value.product_id' => $productModel->id])
                ->andWhere(['field.category_id' => $modelParams->category_id])
                ->indexBy('id')
                ->all();
//            de($query);

        }

        return $query;
    }
}
