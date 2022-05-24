<?php

namespace forma\modules\selling\records\patient;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\selling\records\patient\Patient;

/**
 * PatientSearch represents the model behind the search form about `forma\modules\selling\records\patient\Patient`.
 */
class PatientSearch extends Patient
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'years', 'gender'], 'integer'],
            [['nameCompany', 'address', 'name', 'surname', 'patronymic', 'dateBirth', 'location', 'phone', 'diagnosis', 'complaints', 'allDiseases', 'developmentOfDisease', 'surveyData', 'bite', 'mouthCondition', 'xray', 'laboratoryTests', 'colorVita', 'hygieneЕrainingDate', 'dateHygieneControl'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Patient::find();
        $this->access($query);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'years' => $this->years,
            'gender' => $this->gender,
            'dateBirth' => $this->dateBirth,
            'hygieneЕrainingDate' => $this->hygieneЕrainingDate,
            'dateHygieneControl' => $this->dateHygieneControl,
        ]);

        $query->andFilterWhere(['like', 'nameCompany', $this->nameCompany])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'patronymic', $this->patronymic])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'diagnosis', $this->diagnosis])
            ->andFilterWhere(['like', 'complaints', $this->complaints])
            ->andFilterWhere(['like', 'allDiseases', $this->allDiseases])
            ->andFilterWhere(['like', 'developmentOfDisease', $this->developmentOfDisease])
            ->andFilterWhere(['like', 'surveyData', $this->surveyData])
            ->andFilterWhere(['like', 'bite', $this->bite])
            ->andFilterWhere(['like', 'mouthCondition', $this->mouthCondition])
            ->andFilterWhere(['like', 'xray', $this->xray])
            ->andFilterWhere(['like', 'laboratoryTests', $this->laboratoryTests])
            ->andFilterWhere(['like', 'colorVita', $this->colorVita]);

        return $dataProvider;
    }
}
