<?php

namespace forma\modules\core\records;

use Yii;

/**
 * This is the model class for table "regularity".
 *
 * @property int $id
 * @property string $name
 * @property int $user_id
 * @property int $order
 *
 * @property User $user
 * @property RegularityItem[] $regularityItems
 */
class Regularity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'regularity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'user_id', 'order'], 'required'],
            [['user_id', 'order'], 'integer'],
            [['name'], 'string', 'max' => 55],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Регламент'),
            'user_id' => Yii::t('app', 'User ID'),
            'order' => Yii::t('app', 'Порядковый номер'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id'])->inverseOf('regularities');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Item::className(), ['regularity_id' => 'id'])->inverseOf('regularity');
    }
}
