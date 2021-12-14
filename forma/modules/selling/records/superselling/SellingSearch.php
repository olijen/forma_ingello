<?php

namespace forma\modules\selling\records\superselling;

use forma\modules\core\records\User;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\selling\records\superselling\Selling;
use yii\helpers\ArrayHelper;

/**
 * SellingSearch represents the model behind the search form about `forma\modules\selling\records\superselling\Selling`.
 */
class SellingSearch extends \forma\modules\selling\records\selling\Selling
{
    /**
     * @inheritdoc
     */

    public function rules()
    {
        return [
            [['id', 'customer_id', 'warehouse_id', 'state_id'], 'integer'],
            [['name',
                'date_create',
                'date_complete',
                'dialog',
                'next_step',
                'selling_token',
                'customerName', 'customerPhone',
                'warehouseName', 'stateName',
                'sumPurchaseСost',
                'sumСost',
                'markup'], 'safe'],
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
        $query = \forma\modules\selling\records\selling\Selling::find();
        $this->access($query);
        $query->joinWith('customer');
        $query->joinWith('warehouse');
        $query->joinWith('toState');
        $query->joinWith('sellingProducts');
        $query->select('`selling`.*, sum(selling_product.purchase_cost*selling_product.quantity) AS sumPurchaseСost
            ,sum(selling_product.cost*selling_product.quantity) AS sumСost,
            (sum(selling_product.cost*selling_product.quantity)-sum(selling_product.purchase_cost*selling_product.quantity)) AS markup')
            ->groupBy('id');

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
                    'stateName' => [
                        'asc' => ['state.name' => SORT_ASC],
                        'desc' => ['state.name' => SORT_DESC],
                    ],
                    'sumPurchaseСost' => [
                        'asc' => ['sumPurchaseСost' => SORT_ASC],
                        'desc' => ['sumPurchaseСost' => SORT_DESC],
                    ],
                    'sumСost' => [
                        'asc' => ['sumСost' => SORT_ASC],
                        'desc' => ['sumСost' => SORT_DESC],
                    ],
                    'markup' => [
                        'asc' => ['markup' => SORT_ASC],
                        'desc' => ['markup' => SORT_DESC],
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
            ->andFilterWhere(['like', 'warehouse.id', $this->warehouseName])
            ->andFilterWhere(['like', 'state.name', $this->stateName])
            ->andFilterHaving(['like', 'sumPurchaseСost', $this->sumPurchaseСost])
            ->andFilterHaving(['like', 'sumСost', $this->sumСost])
            ->andFilterHaving(['like', 'markup', $this->markup]);

        return $dataProvider;
    }
}
