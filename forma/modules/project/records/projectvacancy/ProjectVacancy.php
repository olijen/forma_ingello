<?php

namespace forma\modules\project\records\projectvacancy;

use forma\components\AccessoryActiveRecord;
use forma\modules\project\records\project\Project;
use forma\modules\vacancy\records\Vacancy;
use Yii;

/**
 * This is the model class for table "project_vacancy".
 * @property int $id
 * @property int $project_id
 * @property int $vacancy_id
 * @property int $count
 *
 * @property Project $project
 * @property Vacancy $vacancy
 */
class ProjectVacancy extends AccessoryActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_vacancy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_id', 'vacancy_id'], 'required'],
            [['project_id', 'vacancy_id', 'count'], 'integer'],
            [['project_id', 'vacancy_id'], 'unique', 'targetAttribute' => ['project_id', 'vacancy_id']],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
            [['vacancy_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vacancy::className(), 'targetAttribute' => ['vacancy_id' => 'id']],
            [['count'], 'default', 'value' => 1]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'project_id' => Yii::t('app', 'Проект'),
            'vacancy_id' => Yii::t('app', 'Вакансия'),
            'count' => Yii::t('app', 'Количество позиций'),
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
    public function getVacancy()
    {
        return $this->hasOne(Vacancy::className(), ['id' => 'vacancy_id']);
    }

    /**
     * {@inheritdoc}
     * @return ProjectVacancyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProjectVacancyQuery(get_called_class());
    }
}
