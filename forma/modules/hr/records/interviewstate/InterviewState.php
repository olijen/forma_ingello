<?php

namespace forma\modules\hr\records\interviewstate;

use forma\components\AccessoryActiveRecord;
use Yii;

/**
* This is the model class for table "interview_state".
*
  * @property integer $id
  * @property string $name
  * @property integer $user_id
  * @property integer $order
  * @property string $description
*/
class InterviewState extends AccessoryActiveRecord
{


  /**
  * @inheritdoc
  */
    public static function tableName()
    {
        return 'interview_state';
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
                [['user_id', 'order'], 'integer'],
                [['description'], 'string'],
                [['name'], 'string', 'max' => 255]
        ];
    }

  /**
  * @inheritdoc
  */
    public function attributeLabels()
    {
        return [
            'name' => 'Состояния',
            'order' => 'Порядок',
            'description' => 'Описание',
        ];
    }
  
  /**
  * @inheritdoc
  * @return InterviewStateQuery the active query used by this AR class.
  */
    public static function find()
    {
        return new InterviewStateQuery(get_called_class());
    }
}
