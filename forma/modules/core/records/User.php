<?php

namespace forma\modules\core\records;

use Yii;

/**
* This is the model class for table "user".
*
  * @property integer $id
  * @property string $username
  * @property string $password
  * @property string $email
  * @property string $role
  * @property string $auth_key
  * @property string $access_token
  * @property string $phone
  * @property integer $parent_id
  * @property integer $confirmed_email
  * @property string $email_string
  *
      * @property AccessInterface[] $accessInterfaces
      * @property InterviewState[] $interviewStates
      * @property Message[] $messages
      * @property Message[] $messages0
      * @property ProjectUser[] $projectUsers
      * @property Project[] $projects
      * @property Regularity[] $regularities
      * @property State[] $states
      * @property SystemEventUser[] $systemEventUsers
      * @property TestType[] $testTypes
      * @property UserProfile[] $userProfiles
      * @property UserProfileRule[] $userProfileRules
      * @property UserPushToken[] $userPushTokens
      * @property WarehouseUser[] $warehouseUsers
      * @property WidgetUser[] $widgetUsers
  */
class User extends \yii\db\ActiveRecord
{


  /**
  * @inheritdoc
  */
  public static function tableName()
  {
    return 'user';
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
            [['username', 'password', 'email'], 'required'],
            [['parent_id', 'confirmed_email'], 'integer'],
            [['username', 'email'], 'string', 'max' => 100],
            [['password', 'role', 'auth_key', 'access_token', 'phone', 'email_string'], 'string', 'max' => 255],
            [['email'], 'email']
        ];
  }

  /**
  * @inheritdoc
  */
  public function attributeLabels()
  {
    return [
        'id' => 'ID',
        'username' => 'Username',
        'password' => 'Password',
        'email' => 'Email',
        'role' => 'Role',
        'auth_key' => 'Auth Key',
        'access_token' => 'Access Token',
        'phone' => 'Phone',
        'parent_id' => 'Parent ID',
        'confirmed_email' => 'Confirmed Email',
        'email_string' => 'Email String',
    ];
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getAccessInterfaces()
  {
  return $this->hasMany(AccessInterface::className(), ['user_id' => 'id']);
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getInterviewStates()
  {
  return $this->hasMany(InterviewState::className(), ['user_id' => 'id']);
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getMessages()
  {
  return $this->hasMany(Message::className(), ['from_user_id' => 'id']);
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getMessages0()
  {
  return $this->hasMany(Message::className(), ['to_user_id' => 'id']);
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getProjectUsers()
  {
  return $this->hasMany(ProjectUser::className(), ['user_id' => 'id']);
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getProjects()
  {
  return $this->hasMany(Project::className(), ['id' => 'project_id'])->viaTable('project_user', ['user_id' => 'id']);
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getRegularities()
  {
  return $this->hasMany(Regularity::className(), ['user_id' => 'id']);
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getStates()
  {
  return $this->hasMany(State::className(), ['user_id' => 'id']);
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getSystemEventUsers()
  {
  return $this->hasMany(SystemEventUser::className(), ['user_id' => 'id']);
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getTestTypes()
  {
  return $this->hasMany(TestType::className(), ['user_id' => 'id']);
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getUserProfiles()
  {
  return $this->hasMany(UserProfile::className(), ['user_id' => 'id']);
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getUserProfileRules()
  {
  return $this->hasMany(UserProfileRule::className(), ['user_id' => 'id']);
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getUserPushTokens()
  {
  return $this->hasMany(UserPushToken::className(), ['user_id' => 'id']);
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getWarehouseUsers()
  {
  return $this->hasMany(WarehouseUser::className(), ['user_id' => 'id']);
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getWidgetUsers()
  {
  return $this->hasMany(WidgetUser::className(), ['user_id' => 'id']);
  }
}
