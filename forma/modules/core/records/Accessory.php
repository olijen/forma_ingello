<?php

namespace forma\modules\core\records;

use Yii;

/**
 * This is the model class for table "accessory".
 *
 * @property integer $id
 * @property string $entity_class
 * @property integer $entity_id
 * @property integer $user_id
 */
class Accessory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'accessory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entity_id', 'user_id'], 'integer'],
            [['entity_class'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'entity_class' => 'Entity Class',
            'entity_id' => 'Entity ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @inheritdoc
     * @return AccessoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AccessoryQuery(get_called_class());
    }
}
