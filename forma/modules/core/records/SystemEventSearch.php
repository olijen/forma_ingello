<?php

namespace forma\modules\core\records;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\core\records\SystemEvent;

/**
 * SystemEventSearch represents the model behind the search form of `forma\modules\core\records\SystemEvent`.
 */
class SystemEventSearch extends SystemEvent
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['date_time', 'application', 'module', 'data'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = SystemEvent::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'date_time' => $this->date_time,
            'user_id' => \Yii::$app->user->id,
        ]);

        $query->andFilterWhere(['like', 'application', $this->application])
            ->andFilterWhere(['like', 'module', $this->module])
            ->andFilterWhere(['like', 'data', $this->data]);

        return $dataProvider;
    }
}
