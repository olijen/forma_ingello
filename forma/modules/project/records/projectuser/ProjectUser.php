<?php

namespace forma\modules\project\records\projectuser;

use forma\components\AccessoryActiveRecord;
use forma\modules\core\records\User;
use forma\modules\project\records\project\Project;
use Yii;

/**
 * This is the model class for table "project_user".
 *
 * @property int $project_id
 * @property int $user_id
 *
 * @property Project $project
 * @property User $user
 */
class ProjectUser extends AccessoryActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_id', 'user_id'], 'required'],
            [['project_id', 'user_id'], 'integer'],
            [['project_id', 'user_id'], 'unique', 'targetAttribute' => ['project_id', 'user_id']],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'project_id' => Yii::t('app', 'Project ID'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
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
     * @return ProjectUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProjectUserQuery(get_called_class());
    }
}
