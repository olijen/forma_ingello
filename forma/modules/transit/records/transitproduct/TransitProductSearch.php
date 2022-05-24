<?php

namespace forma\modules\transit\records\transitproduct;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

/**
 * TransitProductSearch represents the model behind the search form about `\forma\modules\transit\records\transitproduct\TransitProduct`.
 */
class TransitProductSearch extends TransitProduct
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
            [['id', 'product_id', 'transit_id', 'quantity', 'overhead_cost_id'], 'integer'],
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
        $query = TransitProduct::find();
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
            'transit_id' => $this->transit_id,
            'quantity' => $this->quantity,
            'overhead_cost_id' => $this->overhead_cost_id,
        ]);

        $query->andFilterWhere(['like', 'product.name', $this->product_name])
            ->andFilterWhere(['like', 'category.name', $this->product_category_name])
            ->andFilterWhere(['like', 'manufacturer.name', $this->product_manufacturer_name]);

        return $dataProvider;
    }
}
