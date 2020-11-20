<?php

namespace forma\modules\warehouse\records;

use Yii;

/**
 * This is the model class for table "warehouse_user".
 *
 * @property integer $id
 * @property integer $warehouse_id
 * @property integer $user_id
 */
class WarehouseUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'warehouse_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['warehouse_id', 'user_id'], 'required'],
            [['warehouse_id', 'user_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'warehouse_id' => 'Warehouse ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @inheritdoc
     * @return WarehouseUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WarehouseUserQuery(get_called_class());
    }
}