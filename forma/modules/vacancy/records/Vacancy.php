<?php

namespace forma\modules\vacancy\records;

use forma\components\AccessoryActiveRecord;
use forma\components\EntityLister;
use forma\modules\core\records\User;
use forma\modules\hr\records\interview\Interview;
use forma\modules\hr\records\interviewstate\InterviewState;
use forma\modules\hr\records\interviewvacancy\InterviewVacancy;
use forma\modules\project\records\project\Project;
use forma\modules\project\records\projectvacancy\ProjectVacancy;
use Yii;
use yii\db\Query;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "vacancy".
 *
 * @property int $id
 * @property string $name
 * @property double $rate
 * @property string $description
 *
 * @property InterviewVacancy[] $interviewVacancies
 * @property Interview[] $interviews
 * @property ProjectVacancy[] $projectVacancies
 * @property Project[] $projects
 */
class Vacancy extends AccessoryActiveRecord
{
    public $projectId;
    public $stateId;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vacancy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rate'], 'number'],
            [['name'], 'string', 'max' => 255],
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
            'rate' => Yii::t('app', 'Ставка'),
            'description' => Yii::t('app', 'Описание'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInterviewVacancies()
    {
        return $this->hasMany(InterviewVacancy::className(), ['vacancy_id' => 'id']);
    }

    public static function getList($byUser = null)
    {
        return EntityLister::getList(self::className(), $byUser);
    }
    public static function getListVacancyProject()
    {
        $user = \Yii::$app->getUser()->getIdentity();

        $projectVacancies = ProjectVacancy::find()->joinWith(['accessory'])
            ->andWhere(['accessory.user_id' => $user->getId()])
            ->andWhere(['accessory.entity_class' => ProjectVacancy::className()])->all();
        $projectVacancyData = [];
        foreach ($projectVacancies as $projectVacancy) {
            $projectVacancyData[] = [
                'id' => $projectVacancy->vacancy_id,
                'name' => $projectVacancy->vacancy->name . '|' . $projectVacancy->project->name
            ];
        }
        return $projectVacancyData;
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInterviews()
    {
        return $this->hasMany(Interview::className(), ['id' => 'interview_id'])->viaTable('interview_vacancy', ['vacancy_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectVacancies()
    {
        return $this->hasMany(ProjectVacancy::className(), ['vacancy_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['id' => 'project_id'])->viaTable('project_vacancy', ['vacancy_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return VacancyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VacancyQuery(get_called_class());
    }
}
