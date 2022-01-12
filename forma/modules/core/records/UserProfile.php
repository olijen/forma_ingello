<?php

namespace forma\modules\core\records;

use Yii;

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

  public $file;

  const IMAGE_DIR_NAME = 'user-profile';

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
  public function behaviors()
  {
    return [
            'image_uploader' => [
              'class' => \wokster\behaviors\ImageUploadBehavior::className(),
              'size_for_resize' => [
              [400,400,true],
              [1000,null,false],
              [50,50,true]
              ],
              'dir_name'=>self::IMAGE_DIR_NAME,
              'attribute' => 'image',
            ],
          ];
  }

  /**
  * @inheritdoc
  */
  public function rules()
  {
    return [
            [['image'], 'string'],
            [['user_id', 'rank_id'], 'integer'],
            [['file'], 'file', 'maxSize' => 2097152]
        ];
  }

  /**
  * @inheritdoc
  */
  public function attributeLabels()
  {
    return [
        'id' => 'ID',
        'image' => 'Image',
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
}
