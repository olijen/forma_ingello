<?php

namespace forma\modules\core\records;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\core\records\Rule;

/**
 * RuleSearch represents the model behind the search form about `forma\modules\core\records\Rule`.
 */
class RuleSearch extends Rule
{
    /**
     * @inheritdoc
     */
    public $item;

    public function rules()
    {
        return [
            [['id', 'count_action', 'item_id'], 'integer'],
            [['action', 'table', 'rule_name', 'item', 'icon', 'rank_id', 'link'], 'safe'],
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
        $query = Rule::find();
        $this->access($query);
        $query->joinWith('rank');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => [
                    'rule_name',
                    'action',
                    'link',
                    'table',
                    'count_action',
                    'icon',
                    'rank_id' => [
                        'asc' => ['rank.name' => SORT_ASC],
                        'desc' => ['rank.name' => SORT_DESC],
                        'default' => SORT_DESC
                    ],
                    'item' => [
                        'asc' => ['item.title' => SORT_ASC],
                        'desc' => ['item.title' => SORT_DESC],
                        'default' => SORT_DESC
                    ],
                ],
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'count_action' => $this->count_action,
            'rank_id' => $this->rank_id,
            'link' => $this->link,
        ]);
        $query->andFilterWhere(['like', 'action', $this->action]);
        $query->andFilterWhere(['like', 'table', $this->table])
            ->andFilterWhere(['like ', 'rule_name', $this->rule_name]);
        $query->joinWith('item')->andFilterWhere(['like ', 'item.title', $this->item]);

        return $dataProvider;
    }
}
