<?php

namespace forma\modules\hr\records\volunteer;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\hr\records\volunteer\Volunteer;

/**
 * VolunteerSearch represents the model behind the search form about `forma\modules\hr\records\volunteer\Volunteer`.
 */
class VolunteerSearch extends Volunteer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['status', 'full_name', 'phone', 'support_type', 'comment', 'capacity', 'options', 'created_at'], 'safe'],
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
        $query = Volunteer::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
        ]);

        if (gettype($this->support_type) == "array") {
            foreach ($this->support_type as $support) {
                $query->orFilterWhere(['support_type' => $support]);
            }
        } else {
            $query->andFilterWhere(['support_type' => $this->support_type]);
        }

        $query->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'full_name', $this->full_name])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'comment', $this->comment])
            ->andFilterWhere(['>=', 'capacity', $this->capacity])
            ->andFilterWhere(['like', 'options', $this->options]);

        return $dataProvider;
    }
}
