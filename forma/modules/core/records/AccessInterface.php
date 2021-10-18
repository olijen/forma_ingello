<?php

namespace forma\modules\core\records;

use Yii;

/**
* This is the model class for table "access_interface".
*
  * @property integer $id
  * @property integer $current_mark
  * @property integer $rule_id
  * @property integer $user_id
  * @property integer $status
  *
      * @property Rule $rule
      * @property User $user
  */
class AccessInterface extends \yii\db\ActiveRecord
{


  /**
  * @inheritdoc
  */
  public static function tableName()
  {
    return 'access_interface';
  }

  /**
  * @inheritdoc
  */
  public function behaviors()
  {
    return [
          ];
  }

  /**
  * @inheritdoc
  */
  public function rules()
  {
    return [
            [['current_mark', 'rule_id', 'user_id'], 'integer'],
            [['status'], 'boolean']
        ];
  }

  /**
  * @inheritdoc
  */
  public function attributeLabels()
  {
    return [
        'id' => 'ID',
        'current_mark' => 'Current Mark',
        'rule_id' => 'Rule ID',
        'user_id' => 'User ID',
        'status' => 'Status',
    ];
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getRule()
  {
  return $this->hasOne(Rule::className(), ['id' => 'rule_id']);
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
  * @return AccessInterfaceQuery the active query used by this AR class.
  */
  public static function find()
  {
  return new AccessInterfaceQuery(get_called_class());
  }
}
