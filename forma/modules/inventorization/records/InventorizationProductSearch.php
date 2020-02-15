<?php

namespace forma\modules\inventorization\records;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\inventorization\records\InventorizationProduct;
use yii\helpers\ArrayHelper;

/**
 * InventorizationProductSearch represents the model behind the search form about `\forma\modules\inventorization\records\InventorizationProduct`.
 */
class InventorizationProductSearch extends InventorizationProduct
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
            [['id', 'product_id', 'inventorization_id', 'quantity'], 'integer'],
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
        $query = InventorizationProduct::find()
            ->joinWith(['product', 'product.category', 'product.manufacturer'], false, 'INNER JOIN');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => ArrayHelper::merge($dataProvider->sort->attributes, [
                'product_name' => [
                    'asc' => ['product.name' => SORT_ASC],
                    'desc' => ['product.name' => SORT_DESC],
                ],
                'product_category_name' => [
                    'asc' => ['category.name' => SORT_ASC],
                    'desc' => ['category.name' => SORT_DESC],
                ],
                'product_manufacturer_name' => [
                    'asc' => ['manufacturer.name' => SORT_ASC],
                    'desc' => ['manufacturer.name' => SORT_DESC],
                ],
            ]),
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
            'inventorization_id' => $this->inventorization_id,
            'quantity' => $this->quantity,
        ]);

        $query->andFilterWhere(['like', 'product.name', $this->product_name])
            ->andFilterWhere(['like', 'category.name', $this->product_category_name])
            ->andFilterWhere(['like', 'manufacturer.name', $this->product_manufacturer_name]);

        return $dataProvider;
    }
}
