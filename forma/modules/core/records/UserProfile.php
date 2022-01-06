<?php

namespace forma\modules\core\records;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "user_profile".
 *
 * @property integer $id
 * @property string $image
 * @property integer $user_id
 * @property integer $rank_id
 *
 * @property Rank $rank
 * @property User $user
 * @property UserProfileRule[] $userProfileRules
 */
class UserProfile extends \yii\db\ActiveRecord
{
    public $imageFile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_profile';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image'], 'string'],
            [['imageFile'], 'file', 'extensions' => 'png, jpg'],
            [['user_id', 'rank_id'], 'integer'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('./img/user-profile/' . $this->image->baseName . '.' . $this->image->extension);
            return true;
        } else {
            return false;
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Фото профиля',
            'imageFile' => 'Фото профиля',
            'user_id' => 'User ID',
            'rank_id' => 'Rank ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRank()
    {
        return $this->hasOne(Rank::className(), ['id' => 'rank_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfileRules()
    {
        return $this->hasMany(UserProfileRule::className(), ['user_profile_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return UserProfileRuleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserProfileRuleQuery(get_called_class());
    }
}
