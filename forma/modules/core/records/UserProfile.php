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
  * @inheritdoc
  * @return UserProfileQuery the active query used by this AR class.
  */
  public static function find()
  {
  return new UserProfileQuery(get_called_class());
  }
}
