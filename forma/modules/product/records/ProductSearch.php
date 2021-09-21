<?php

namespace forma\modules\product\records;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

/**
 * ProductSearch represents the model behind the search form about `\forma\modules\product\records\Product`.
 */
class ProductSearch extends Product
{
    public $color_name;

    public $packUnits;
    /**
     * @var mixed|null
     */


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type_id', 'category_id', 'manufacturer_id'], 'integer'],
            [['sku', 'name', 'note', 'type',], 'safe'],
            [['rating'], 'number'],
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
        $query = Product::find();
        $this->access($query);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (isset($params['FieldProductValue']) ||
            isset($params['sort']) && stristr($params['sort'], 'FieldProductValue')) {
            $query->joinWith(['fieldProductValues']);
        }

        if (isset($params['FieldProductValue'])) {
            $query = FieldProductValue::getSqlFieldProductValueFilter($query, $params['FieldProductValue']);
        }

        if (isset($params['sort']) && stristr($params['sort'], 'FieldProductValue')) {
            $dataProvider = FieldProductValue::getSortDataProvider($params['sort'], $dataProvider);
        } else {
            $query->groupBy(['product.id']);
        }

        if (isset($params['ProductSearch']['category_id'])) {
            $categoriesId = $this->getCategoriesId((int)$this->category_id);
            $query->andWhere(['category_id' => $this->categoriesId]);
        }
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        // grid filtering conditions
        $query->andFilterWhere([
            'product.id' => $this->id,
            'product.type_id' => $this->type_id,
            'product.manufacturer_id' => $this->manufacturer_id,
            'product.volume' => $this->volume,
            'product.year_chart' => $this->year_chart,
            'product.proof' => $this->proof,
            'product.rating' => $this->rating,
            'product.batcher' => $this->batcher,
            'product.country_id' => $this->country_id,
            'product.color_id' => $this->color_id,
            'color.name' => $this->color_name,
        ]);

        $query->andFilterWhere(['like', 'product.sku', $this->sku])
            ->andFilterWhere(['like', 'product.customs_code', $this->customs_code])
            ->andFilterWhere(['like', 'product.name', $this->name])
            ->andFilterWhere(['like', 'product.note', $this->note]);
        $query->groupBy('product.id');

        return $dataProvider;
    }
}
