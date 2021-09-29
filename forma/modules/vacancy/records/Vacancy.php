<?php

namespace forma\modules\vacancy\records;

use forma\components\AccessoryActiveRecord;
use forma\components\EntityLister;
use forma\modules\hr\records\interview\Interview;
use forma\modules\hr\records\interviewstate\InterviewState;
use forma\modules\hr\records\interviewvacancy\InterviewVacancy;
use forma\modules\project\records\project\Project;
use forma\modules\project\records\projectvacancy\ProjectVacancy;
use Yii;

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

    public function getWorkerByProjectVacancyInterviewStateId($vacancy_id, $project_id, $state_id)
    {
        $interviewStates = InterviewState::find()->where(['user_id' => Yii::$app->user->id])->all();
        $interviewStateIds = [];
        foreach ($interviewStates as $interviewState) {
            $interviewStateIds[] = $interviewState->id;
        }
        $interviews = Interview::find()
            ->where(
                [
                    'vacancy_id' => $vacancy_id,
                    'project_id' => $project_id,
                ]
            )
            ->andWhere(['state_id' => $interviewStateIds])
            ->all();
        $workerByInterviewStates = [];
        $workers = [];
//        foreach ($interviews as $interview) {
//            if (array_key_exists($interview->state_id, $workerByInterviewStates)) {
//                array_push($workerByInterviewStates, $interview->worker_id);
//            }
//            $workerByInterviewStates[$interview->state_id] = $interview->worker_id;
//        }
//        dd($workerByInterviewStates);
        return $workers;
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
