<?php

namespace forma\modules\product\records;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "field_product_value".
 *
 * @property integer $id
 * @property integer $field_id
 * @property integer $product_id
 * @property string $value
 *
 * @property Field $field
 * @property Product $product
 */
class FieldProductValue extends \yii\db\ActiveRecord
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'field_product_value';
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
            [['field_id', 'product_id'], 'required'],
            [['field_id', 'product_id'], 'integer'],
            [['value'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'field_id' => 'Виджет(id)',
            'product_id' => 'Продукт(id)',
            'value' => 'Значения в продуктах',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getField()
    {
        return $this->hasOne(Field::className(), ['id' => 'field_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * @inheritdoc
     * @return FieldProductValueQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FieldProductValueQuery(get_called_class());
    }

    public static function eachFieldProductValueSave($fieldProductValues, $productId)
    {
        foreach ($fieldProductValues as $fieldId => $fieldValueModel) {
            foreach ($fieldValueModel as $fieldValueId => $fieldValue) {
                if ($fieldValueId == 'null') {
                    self::fieldProductValueSave(null, $fieldValue, $fieldId, $productId);
                } else {
                    self::fieldProductValueSave($fieldValueId, $fieldValue, null, null);
                }
            }
        }
    }

    public static function fieldProductValueSave($id, $fieldValue, $fieldId, $productId)
    {
        if (is_null($id)) {
            $model = new FieldProductValue();
            $model->product_id = $productId;
            $model->field_id = $fieldId;
        } else {
            $model = FieldProductValue::findOne($id);
        }

        if (isset($fieldValue['multiSelect']['value'])) {
            if (!empty($fieldValue['multiSelect']['value'])) {
                $model->value = json_encode($fieldValue['multiSelect']['value']);
            } else {
                $model->value = '';
            }
        } elseif (isset($fieldValue['value'])) {
            $model->value = $fieldValue['value'];
        }

        if (!$model->validate()) {
            $model->errors;
            var_dump($model->errors);
            die();
        }
        $model->save();
    }

    public static function getSqlFieldProductValueFilter($query, $fieldProductValues)
    {
        foreach ($fieldProductValues as $fieldId => $productId) {
            foreach ($productId as $fieldProductValue) {

                $sqlFieldProductValue = '';
                if (isset($fieldProductValue["multiSelect"]['value']) && !empty($fieldProductValue["multiSelect"]['value'])) {
                    $fieldValueMultiSelectIds = $fieldProductValue["multiSelect"]['value'];
                    foreach ($fieldValueMultiSelectIds as $fieldValueMultiSelectId) {
                        if (empty($sqlFieldProductValue)) {
                            $sqlFieldProductValue .= '\'%"' . $fieldValueMultiSelectId . '"%\'';
                        } else {
                            $sqlFieldProductValue .= ' and value like \'%"' . $fieldValueMultiSelectId . '"%\'';
                        }
                    }
                } elseif (isset($fieldProductValue['value']) && !empty($fieldProductValue['value'])
                    || isset($fieldProductValue['value']) && $fieldProductValue['value'] === '0') {
                    $sqlFieldProductValue = '\'%' . $fieldProductValue['value'] . '%\'';
                }

                if (!empty($sqlFieldProductValue)) {
                    $sql = 'field_product_value.`id` = ANY (SELECT id
                         FROM `field_product_value`
                         WHERE value LIKE ' . $sqlFieldProductValue . ' and `field_id` = ' . $fieldId . ')';
                        $query->andWhere($sql);
                }
            }
        }

        return $query;
    }

    public static function getSortDataProvider($sortFieldProductValue, $dataProvider)
    {

        if (stristr($sortFieldProductValue, '-')) {
            $sortFieldProductValue[0] = ' ';
            $sortFieldProductValue = trim($sortFieldProductValue);
        }
        $dataProvider->setSort([
            'attributes' =>
                ArrayHelper::merge($dataProvider->sort->attributes,
                    [
                        $sortFieldProductValue
                        => [
                            'asc' => ['field_product_value.value' => SORT_ASC],
                            'desc' => ['field_product_value.value' => SORT_DESC],
                        ],
                    ]),
        ]);
        return $dataProvider;
    }
}
