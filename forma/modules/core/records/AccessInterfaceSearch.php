<?php

namespace forma\modules\core\records;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\core\records\AccessInterface;

/**
 * AccessInterfaceSearch represents the model behind the search form about `forma\modules\core\records\AccessInterface`.
 */
class AccessInterfaceSearch extends AccessInterface
{
    /**
     * @inheritdoc
     */
    public $rule_name;
    public $status;
    public function rules()
    {
        return [
            [['id', 'current_mark', 'rule_id', 'user_id'], 'integer'],
            [['status','rule_name','status'], 'safe'],
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
        $query = AccessInterface::find();
        $query->joinWith('user');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => [
                    'current_mark',
                    'status',
                    'rule_name' => [
                        'asc' => ['rule.rule_name' => SORT_ASC],
                        'desc' => ['rule.rule_name' => SORT_DESC],
                        'default' => SORT_DESC
                    ],
                    'user' => [
                        'asc' => ['user.email' => SORT_ASC],
                        'desc' => ['user.email' => SORT_DESC],
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
            'current_mark' => $this->current_mark,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status]);
        $query->joinWith('rule')->andFilterWhere(['like', 'rule.rule_name', $this->rule_name]);

        return $dataProvider;
    }
}
