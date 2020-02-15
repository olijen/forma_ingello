<?php

namespace forma\modules\selling\records\patient;

use Yii;

/**
 * This is the model class for table "patient".
 *
 * @property integer $id
 * @property string $nameCompany
 * @property string $address
 * @property integer $years
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property integer $gender
 * @property string $dateBirth
 * @property string $location
 * @property string $phone
 * @property string $diagnosis
 * @property string $complaints
 * @property string $allDiseases
 * @property string $developmentOfDisease
 * @property string $surveyData
 * @property string $bite
 * @property string $mouthCondition
 * @property string $x-ray
 * @property string $laboratoryTests
 * @property string $colorVita
 * @property string $hygieneЕrainingDate
 * @property string $dateHygieneControl
 */
class Patient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['years', 'gender'], 'integer'],
            [['dateBirth', 'hygieneЕrainingDate', 'dateHygieneControl'], 'safe'],
            [['complaints', 'allDiseases', 'developmentOfDisease', 'surveyData', 'bite', 'mouthCondition', 'xray', 'laboratoryTests'], 'string'],
            [['nameCompany', 'address', 'name', 'surname', 'patronymic', 'location', 'phone', 'diagnosis'], 'string', 'max' => 255],
            [['colorVita'], 'string', 'max' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ИД'),
            'nameCompany' => Yii::t('app', 'Имя министерства'),
            'address' => Yii::t('app', 'Адреса мед-центров'),
            'years' => Yii::t('app', 'Текущий год'),
            'name' => Yii::t('app', 'Имя'),
            'surname' => Yii::t('app', 'Фамилия'),
            'patronymic' => Yii::t('app', 'Отчество'),
            'gender' => Yii::t('app', 'Пол'),
            'dateBirth' => Yii::t('app', 'Дата рождения'),
            'location' => Yii::t('app', 'Место проживания'),
            'phone' => Yii::t('app', 'Номер телефона'),
            'diagnosis' => Yii::t('app', 'Диагноз'),
            'complaints' => Yii::t('app', 'Жалобы'),
            'allDiseases' => Yii::t('app', 'История болезни'),
            'developmentOfDisease' => Yii::t('app', 'Развитие текущего заболевания'),
            'surveyData' => Yii::t('app', 'Дата объективного осмотра, внешний осмотр, состояние зубов'),
            'bite' => Yii::t('app', 'Прикус'),
            'mouthCondition' => Yii::t('app', 'Состояние гигиены рта, состояние слизистой оболочки'),
            'xray' => Yii::t('app', 'Ренгеновское обследование'),
            'laboratoryTests' => Yii::t('app', 'Лабараторное обследование'),
            'colorVita' => Yii::t('app', 'Цвет зубов по шкале Вита'),
            'hygieneЕrainingDate' => Yii::t('app', 'Дата обучения ухода за полостью рта'),
            'dateHygieneControl' => Yii::t('app', 'Дата контроля за уходом полостью рта'),
        ];
    }

    /**
     * @inheritdoc
     * @return PatientQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PatientQuery(get_called_class());
    }
}
