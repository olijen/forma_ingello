<?php

namespace forma\modules\product\records;

use forma\components\AccessoryActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "color".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Product[] $products
 */
class Color extends AccessoryActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'color';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
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
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['color_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ColorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ColorQuery(get_called_class());
    }

    public static function getPallet($rowSize = 6)
    {
        $pallet = [];

        $colorsNames = ArrayHelper::getColumn(self::find()->all(), 'name');

        for ($i = 0; $i < count($colorsNames); $i++) {
            $colorName = $colorsNames[$i];

            if ($i % $rowSize == 0) {
                $pallet[] = [$colorName];
            } else {
                $pallet[count($pallet) - 1][] = $colorName;
            }
        }

        return $pallet;
    }

    public function beforeSave($insert)
    {
        $this->name = strtolower($this->name);

        return parent::beforeSave($insert);
    }
}
