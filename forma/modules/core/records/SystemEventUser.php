<?php

namespace forma\modules\core\records;

use Yii;

/**
 * This is the model class for table "system_event_user".
 *
 * @property int $id
 * @property int $user_id
 * @property string $object_name
 * @property int $create
 * @property int $update
 * @property int $delete
 * @property int $custom
 *
 * @property User $user
 */
class SystemEventUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'system_event_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'object_name'], 'required'],
            [['user_id', 'create', 'update', 'delete', 'custom'], 'integer'],
            [['object_name'], 'string', 'max' => 200],
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
            'user_id' => 'User ID',
            'object_name' => 'Object Name',
            'create' => 'Create',
            'update' => 'Update',
            'delete' => 'Delete',
            'custom' => 'Custom',
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
     * @return SystemEventUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SystemEventUserQuery(get_called_class());
    }

    public function loadSubscribe($data, $formName = null)
    {
        $this->user_id = Yii::$app->user->id;
        $this->object_name = $data[0];
        $this->create = $data[1]['create'];
        $this->update = $data[1]['update'];
        $this->delete = $data[1]['delete'];
        $this->custom = $data[1]['custom'];
    }

    public function getSystemEventUserByUserId() {

    }
}
