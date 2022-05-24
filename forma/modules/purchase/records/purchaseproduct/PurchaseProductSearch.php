<?php

namespace forma\modules\purchase\records\purchaseproduct;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

/**
 * PurchaseProductSearch represents the model behind the search form about `forma\modules\purchase\records\PurchaseProduct`.
 */
class PurchaseProductSearch extends PurchaseProduct
{
    public $product_category_name;
    public $product_manufacturer_name;
    public $product_name;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'product_id', 'purchase_id', 'quantity', 'overhead_cost_id', 'tax_rate_id'], 'integer'],
            [['cost'], 'number'],
            [['product_name', 'product_category_name', 'product_manufacturer_name'], 'string'],
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
        $query = PurchaseProduct::find();
        $this->access($query);
        $query->joinWith(['product', 'product.category', 'product.manufacturer'], false, 'LEFT JOIN');

        $dataProvider = new ActiveDataProvider([
            'sort' => false,
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
            'product_id' => $this->product_id,
            'purchase_id' => $this->purchase_id,
            'quantity' => $this->quantity,
            'cost' => $this->cost,
            'tax_rate_id' => $this->tax_rate_id,
            'overhead_cost_id' => $this->overhead_cost_id,
        ]);

        $query->andFilterWhere(['like', 'product.name', $this->product_name])
            ->andFilterWhere(['like', 'category.name', $this->product_category_name])
            ->andFilterWhere(['like', 'manufacturer.name', $this->product_manufacturer_name]);

        return $dataProvider;
    }
}
