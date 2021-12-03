<?php

namespace forma\modules\selling\records\superselling;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\selling\records\superselling\Selling;
use yii\helpers\ArrayHelper;

/**
 * SellingSearch represents the model behind the search form about `forma\modules\selling\records\superselling\Selling`.
 */
class SellingSearch extends Selling
{
    /**
     * @inheritdoc
     */
    public $customerName;
    public $customerPhone;
    public $warehouseName;

    public function rules()
    {
        return [
            [['id', 'customer_id', 'warehouse_id', 'state_id'], 'integer'],
            [['name', 'date_create', 'date_complete', 'dialog', 'next_step', 'selling_token', 'customerName', 'customerPhone','warehouseName'], 'safe'],
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
        $query = Selling::find();
        $query->joinWith('customer');
        $query->joinWith('warehouse');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => [
                    'id' => [
                        'asc' => ['id' => SORT_ASC],
                        'desc' => ['id' => SORT_DESC],
                    ],
                    'customerName' => [
                        'asc' => ['customer.name' => SORT_ASC],
                        'desc' => ['customer.name' => SORT_DESC],
                    ],
                    'customerPhone' => [
                        'asc' => ['customer.chief_phone' => SORT_ASC],
                        'desc' => ['customer.chief_phone' => SORT_DESC],
                    ],
                    'warehouseName' => [
                        'asc' => ['warehouse.name' => SORT_ASC],
                        'desc' => ['warehouse.name' => SORT_DESC],
                    ],

                ],
                'defaultOrder' => ['id' => SORT_DESC],
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
            'customer_id' => $this->customer_id,
            'warehouse_id' => $this->warehouse_id,
            'state_id' => $this->state_id,
            'date_create' => $this->date_create,
            'date_complete' => $this->date_complete,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'dialog', $this->dialog])
            ->andFilterWhere(['like', 'next_step', $this->next_step])
            ->andFilterWhere(['like', 'selling_token', $this->selling_token]);
        $query->andFilterWhere(['like', 'customer.name', $this->customerName])
            ->andFilterWhere(['like', 'customer.chief_phone', $this->customerPhone])
            ->andFilterWhere(['like', 'warehouse.name', $this->warehouseName]);

        return $dataProvider;
    }
}
