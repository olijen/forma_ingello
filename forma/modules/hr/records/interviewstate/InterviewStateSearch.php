<?php

namespace forma\modules\hr\records\interviewstate;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\hr\records\interviewstate\InterviewState;

/**
 * InterviewStateSearch represents the model behind the search form about `forma\modules\hr\records\interviewstate\InterviewState`.
 */
class InterviewStateSearch extends InterviewState
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'order'], 'integer'],
            [['name', 'description'], 'safe'],
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
        $query = InterviewState::find()->where(['user_id' => Yii::$app->user->identity->id])->orderBy('order');

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
            'user_id' => $this->user_id,
            'order' => $this->order,
        ]);
        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
