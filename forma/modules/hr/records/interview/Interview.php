<?php

namespace forma\modules\hr\records\interview;

use forma\components\EntityLister;
use forma\modules\core\components\StateActiveRecord;
use forma\modules\core\components\TotalSumBehavior;
use forma\modules\project\records\project\Project;
use forma\modules\vacancy\records\Vacancy;
use forma\modules\worker\records\Worker;
use Yii;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use forma\modules\hr\records\interviewvacancy\InterviewVacancy;

use forma\modules\hr\records\interview\StateCold;
use forma\modules\hr\records\interview\StateLead;
use forma\modules\hr\records\interview\StateFamiliar;
use forma\modules\hr\records\interview\StateHot;
use forma\modules\hr\records\interview\StateMeeting;
use forma\modules\hr\records\interview\StateTestIssue;
use forma\modules\hr\records\interview\StateOffer;
use forma\modules\hr\records\interview\StatePayment;
use forma\modules\hr\records\interview\StateWork;
use forma\modules\hr\records\interview\StateDone;



/**
 * This is the model class for table "interview".
 *
 * @property integer $id
 * @property integer $worker_id
 * @property integer $project_id
 * @property string $name
 * @property string $date_create
 * @property string $date_complete
 * @property integer $vacancy_id
 * @property Worker $worker
 * @property Project $project
 * @property InterviewVacancy[] $interviewVacancy
 * @property string dialog
 * @property string next_step
 */
class Interview extends StateActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'interview';
    }

    /**
     * @inheritdoc
     */
    public function states()
    {
        return [
            StateCold::class,
            StateHot::class,
            StateMeeting::class,
            StateOffer::class,
            StateWork::class,
            StateDone::class,
            StateArchive::class,
        ];
    }

    /**
     * @inheritdoc
     */
    public function getUnits()
    {
        return $this->interviewVacancy;
    }

    /**
     * @inheritdoc
     */
    public function getRelatedProject()
    {
        return $this->project;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['worker_id', 'project_id', 'vacancy_id'], 'required'],
            [['worker_id', 'project_id', 'vacancy_id', 'state'], 'integer'],
            [['name', 'date_create', 'date_complete'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['worker_id'], 'exist', 'skipOnError' => true, 'targetClass' => Worker::className(), 'targetAttribute' => ['worker_id' => 'id']],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
            [['vacancy_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vacancy::className(), 'targetAttribute' => ['vacancy_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'worker_id' => 'Кадр',
            'project_id' => 'Проект',
            'vacancy_id' => 'Вакансия',
            'name' => 'Название',
            'date_create' => 'Дата создания',
            'date_complete' => 'Дата завершения',
            'state' => 'Состояние',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorker()
    {
        return $this->hasOne(Worker::className(), ['id' => 'worker_id']);
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
     * @return \yii\db\ActiveQuery
     */
    public function getInterviewVacancys()
    {
        return $this->hasMany(InterviewVacancy::className(), ['interview_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return InterviewQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InterviewQuery(get_called_class());
    }

    public static function getList($byUser = null)
    {
        return EntityLister::getList(self::className(), $byUser);
    }

    public function getWorkerName()
    {
        return $this->worker->name;
    }

    public function getProjectName()
    {
        return $this->project->name;
    }

    //todo: вынести общее из двух методов
    public static function getDateCreateRange()
    {
        $range = (new Query())
            ->select(['MIN(date_create) AS min', 'MAX(date_create) AS max'])
            ->from(['interview'])
            ->one();

        $min = date('d.m.Y', strtotime($range['min']));
        $max = date('d.m.Y', strtotime($range['max']));

        return "$min - $max";
    }

    public static function getDateCompleteRange()
    {
        $range = (new Query())
            ->select(['MIN(date_complete) AS min', 'MAX(date_complete) AS max'])
            ->from(['interview'])
            ->one();

        $min = date('d.m.Y', strtotime($range['min']));
        $max = date('d.m.Y', strtotime($range['max']));

        return "$min - $max";
    }

    public function beforeSave($insert)
    {
        if ($this->date_create) {
            $this->date_create = date('Y-m-d H:i:s', strtotime($this->date_create));
        }
        if ($this->date_complete) {
            $this->date_complete = date('Y-m-d H:i:s', strtotime($this->date_complete));
        }

        return parent::beforeSave($insert);
    }

    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'getTotalSum' => TotalSumBehavior::className(),
        ]);
    }
}
