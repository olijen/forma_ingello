<?php

namespace forma\modules\hr\records\interview;

use forma\modules\core\records\Accessory;
use forma\modules\core\records\User;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\components\DateRangeHelper;

/**
 * InterviewSearch represents the model behind the search form about `\forma\modules\hr\records\interview\Interview`.
 */
class InterviewSearch extends Interview
{
    public $date_createRange;
    public $date_completeRange;

    public $state_min;
    public $worker_name;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'worker_id', 'project_id', 'vacancy_id', 'state',  'state_min'], 'integer'],
            [['name', 'date_createRange', 'date_completeRange', 'state_min', 'worker_name'], 'safe'],
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
        $query = Interview::find();
        $this->access($query);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith(['worker']);
        // grid filtering conditions
        $query->andFilterWhere([
            'interview.id' => $this->id,
            'interview.worker_id' => $this->worker_id,
            'interview.project_id' => $this->project_id,
            'interview.vacancy_id' => $this->vacancy_id,
            'state' => $this->state,
        ]);

        $query->andFilterWhere(['like', 'worker.name', $this->worker_name]);

        $query->andFilterWhere(['<', 'state', $this->state_min]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        foreach (['date_create', 'date_complete'] as $attribute) {
            $rangeAttribute = $attribute . 'Range';
            if (empty($this->$rangeAttribute)) {
                continue;
            }
            $query->andFilterWhere(DateRangeHelper::getDateRangeCondition($attribute, $this->$rangeAttribute));
        }

        return $dataProvider;
    }
}
