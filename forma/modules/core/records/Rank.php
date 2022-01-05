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
      * @property Rule[] $rules
      * @property UserProfile[] $userProfiles
  */
class Rank extends \yii\db\ActiveRecord
{

  public $file;

  const IMAGE_DIR_NAME = 'rank';

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
        'name' => 'Name',
        'image' => 'Image',
        'order' => 'Order',
    ];
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getRules()
  {
  return $this->hasMany(Rule::className(), ['rank_id' => 'id']);
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
  * @return UserProfileRuleQuery the active query used by this AR class.
  */
  public static function find()
  {
  return new UserProfileRuleQuery(get_called_class());
  }
}
