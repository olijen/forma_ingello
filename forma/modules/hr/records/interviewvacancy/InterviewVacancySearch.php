<?php

namespace forma\modules\hr\records\interviewvacancy;

use forma\modules\hr\records\interviewvacancy\InterviewVacancy;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

/**
 * InterviewVacancySearch represents the model behind the search form about `forma\modules\hr\records\InterviewVacancy\InterviewVacancy`.
 */
class  InterviewVacancySearch extends  InterviewVacancy
{

    public $vacancy_title;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'vacancy_id', 'interview_id', ], 'integer'],
            [['vacancy_title'], 'string'],
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
        $query = InterviewVacancy::find()
            ->joinWith(['vacancy'], false, 'LEFT JOIN');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'sort' => false,
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
            'vacancy_id' => $this->vacancy_id,
            'interview_id' => $this->interview_id,

        ]);

        $query->andFilterWhere(['like', 'vacancy.title', $this->vacancy_title]);


        return $dataProvider;
    }
}
