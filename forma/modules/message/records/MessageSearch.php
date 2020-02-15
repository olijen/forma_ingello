<?php

namespace forma\modules\message\records;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\message\records\Message;

/**
 * MessageSearch represents the model behind the search form about `forma\modules\message\records\Message`.
 */
class MessageSearch extends Message
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'from_user_id', 'to_user_id', 'favorit', 'status'], 'integer'],
            [['title', 'text', 'datetime'], 'safe'],
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
        $query = Message::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'from_user_id' => $this->from_user_id,
            'to_user_id' => $this->to_user_id,
            'datetime' => $this->datetime,
            'favorit' => $this->favorit,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'text', $this->text]);

        return $dataProvider;
    }
}
