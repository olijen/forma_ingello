<?php

namespace forma\modules\worker\records\workervacancy;

use forma\components\AccessoryActiveRecord;
use forma\modules\hr\records\interview\Interview;
use forma\modules\project\records\projectvacancy\ProjectVacancy;
use forma\modules\vacancy\records\Vacancy;
use forma\modules\vacancy\records\VacancySearch;
use forma\modules\worker\records\Worker;
use forma\modules\worker\records\WorkerSearch;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "worker_vacancy".
 *
 * @property int $id
 * @property int $worker_id
 * @property int $vacancy_id
 *
 * @property Vacancy $vacancy
 * @property Worker $worker
 */
class WorkerVacancy extends AccessoryActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'worker_vacancy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['worker_id', 'vacancy_id'], 'integer'],
            [['vacancy_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vacancy::className(), 'targetAttribute' => ['vacancy_id' => 'id']],
            [['worker_id'], 'exist', 'skipOnError' => true, 'targetClass' => Worker::className(), 'targetAttribute' => ['worker_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'worker_id' => Yii::t('app', 'Worker ID'),
            'vacancy_id' => Yii::t('app', 'Vacancy ID'),
        ];
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
    public function getWorker()
    {
        return $this->hasOne(Worker::className(), ['id' => 'worker_id']);
    }

    public static function getListVacancies()
    {
        $vacancies = (new VacancySearch())->search([]);
        return ArrayHelper::map($vacancies->getModels(), 'id', 'name');
    }

    public static function getListVacanciesForWorker($workerId)
    {
        de(Yii::$app->request->post());
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        }
        $vacanciesWorker = self::find()->where(['worker_id' => $workerId])->all();
        foreach ($vacanciesWorker as $vacancyWorker) {
            if (empty($vacancyWorker->vacancy->interviews)) {
                $ids[] = $vacancyWorker->vacancy_id;
            }

        }
        if (empty($ids)) {
            return null;
        }
        $vacancies = Vacancy::find()->where(['id' => $ids])->all();

        return ArrayHelper::map($vacancies, 'id', 'name');
    }

    public static function getListWorker($vacancyProjectId)
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        }

        $vacancy = ProjectVacancy::find()->where(['id' => $vacancyProjectId])->one();

        if (($projectId = Yii::$app->request->get('projectId')) && ($vacancyId = Yii::$app->request->get('vacancyId'))) {
            $vacancy = ProjectVacancy::find()->where(['project_id' => $projectId, 'vacancy_id' => $vacancyId])->one();
        }

        $workerVacancies = self::find()->where(['vacancy_id' => $vacancy->vacancy_id])->all();
        $interviews = Interview::find()->where(['vacancy_id' => $vacancy->vacancy_id])->all();

        foreach ($interviews as $interview) {
            foreach ($workerVacancies as $workerVacancy) {
                if ($workerVacancy->worker_id !== $interview->worker_id) {
                    $ids[] = $workerVacancy->worker_id;
                }
            }
        }

        if (empty($ids)) {
            return null;
        }

        $workerks = Worker::find()->where(['in', 'worker.id', $ids])->allAccessory();

        return ArrayHelper::map($workerks, 'id', 'fullName');
    }

    /**
     * {@inheritdoc}
     * @return WorkerVacancyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WorkerVacancyQuery(get_called_class());
    }
}
