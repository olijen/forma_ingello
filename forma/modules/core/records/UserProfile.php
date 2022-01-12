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
  * @inheritdoc
  * @return UserProfileQuery the active query used by this AR class.
  */
  public static function find()
  {
  return new UserProfileQuery(get_called_class());
  }
}
