<?php

namespace forma\modules\project\records\project;

use forma\components\AccessoryActiveRecord;
use forma\components\EntityLister;
use forma\modules\core\records\User;
use forma\modules\hr\records\interview\Interview;
use forma\modules\project\records\projectuser\ProjectUser;
use forma\modules\project\records\projectvacancy\ProjectVacancy;
use forma\modules\vacancy\records\Vacancy;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $description
 * @property string $state
 *
 * @property ProjectUser[] $projectUsers
 * @property User[] $users
 * @property ProjectVacancy[] $projectVacancies
 * @property Vacancy[] $vacancies
 */
class Project extends AccessoryActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'address'], 'string', 'max' => 255],
            [['state'], 'integer', 'max' => 3],
            [['description'], 'string', 'max' => 65000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Название'),
            'address' => Yii::t('app', 'Адресс'),
            'description' => Yii::t('app', 'Описание проекта'),
            'state' => Yii::t('app', 'Состояние'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInterviews()
    {
        return $this->hasMany(Interview::className(), ['project_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectUsers()
    {
        return $this->hasMany(ProjectUser::className(), ['project_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('project_user', ['project_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectVacancies()
    {
        return $this->hasMany(ProjectVacancy::className(), ['project_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancies()
    {
        return $this->hasMany(Vacancy::className(), ['id' => 'vacancy_id'])->viaTable('project_vacancy', ['project_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ProjectQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProjectQuery(get_called_class());
    }

    public function belongsToUser()
    {
        return ProjectUser::find()->where([
            'project_id' => $this->id,
            'user_id' => Yii::$app->user->id,
        ])->exists();
    }

    public static function getList($byUser = null)
    {
        return EntityLister::getList(self::className(), $byUser);
    }
}
