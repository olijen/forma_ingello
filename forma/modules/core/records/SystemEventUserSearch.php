<?php

namespace forma\modules\core\records;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\core\records\SystemEventUser;

/**
 * SystemEventUserSearch represents the model behind the search form of `forma\modules\core\records\SystemEventUser`.
 */
class SystemEventUserSearch extends SystemEventUser
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'create', 'update', 'delete', 'custom'], 'integer'],
            [['object_name'], 'safe'],
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
        $query = SystemEventUser::find();

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
            'user_id' => $this->user_id,
            'create' => $this->create,
            'update' => $this->update,
            'delete' => $this->delete,
            'custom' => $this->custom,
        ]);

        $query->andFilterWhere(['like', 'object_name', $this->object_name]);

        $query->andWhere(['user_id' => \Yii::$app->user->id]);

        return $dataProvider;
    }
}
