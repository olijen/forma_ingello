<?php

namespace forma\modules\core\records;

use Yii;

/**
 * This is the model class for table "rank".
 *
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property integer $order
 *
 * @property UserProfile[] $userProfiles
 */
class Rank extends \yii\db\ActiveRecord
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rank';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'image'], 'string'],
            [['order'], 'integer'],
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
            'image' => 'Image',
            'order' => 'Order',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfiles()
    {
        return $this->hasMany(UserProfile::className(), ['rank_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return RankQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RankQuery(get_called_class());
    }
}
