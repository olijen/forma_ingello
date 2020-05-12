<?php

namespace forma\modules\core\records;

use Yii;

/**
 * This is the model class for table "system_event".
 *
 * @property int $id
 * @property string $date_time
 * @property string $application
 * @property string $module
 * @property string $data
 * @property int $user_id
 *
 * @property User $user
 */
class SystemEvent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'system_event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_time', 'module', 'data', 'user_id'], 'required'],
            [['date_time'], 'safe'],
            [['user_id'], 'integer'],
            [['application', 'module'], 'string', 'max' => 45],
            [['data'], 'string', 'max' => 250],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_time' => 'Date Time',
            'application' => 'Application',
            'module' => 'Module',
            'data' => 'Data',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return SystemEventQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SystemEventQuery(get_called_class());
    }
}
