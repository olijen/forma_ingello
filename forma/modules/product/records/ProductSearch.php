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
//        echo '<div style="margin-left: 60px; margin-top: 70px;"> <pre>';
//        echo 'параметры namespace forma\modules\product\records\ProductSearch->search </br>';
//        var_dump($params);
//        echo '</pre> </div> </br> </br>';

           $query = Product::find()
            ->joinWith(['accessory'])
            ->andWhere(['accessory.user_id' => Yii::$app->getUser()->getIdentity()->getId()])
            ->andWhere(['accessory.entity_class' => Product::className()]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (isset($params['FieldProductValue']) ||
            isset($params['sort']) && stristr($params['sort'], 'FieldProductValue') == true) {
            $query->joinWith(['fieldProductValues']);
        }
        if (isset($params['FieldProductValue'])) {
            $FieldProductValues = $params['FieldProductValue'];

            $i = 0;
            foreach ($FieldProductValues as $fieldId => $productId) {
                foreach ($productId as $fieldProductValue) {
                    $sqlFieldProductValue = '';
                    if (isset($fieldProductValue["multiSelect"]['value']) && !empty($fieldProductValue["multiSelect"]['value'])) {
                        $fieldValueMultiSelectIds = $fieldProductValue["multiSelect"]['value'];
                            foreach ($fieldValueMultiSelectIds as $fieldValueMultiSelectId) {
                                if (empty($sqlFieldProductValue)) {
                                    $sqlFieldProductValue .= '\'%"' . $fieldValueMultiSelectId . '"%\'';
                                } else {
                                    $sqlFieldProductValue .= ' and value like \'%"' . $fieldValueMultiSelectId . '"%\'';
                                }
                            }
                    } elseif (isset($fieldProductValue['value']) && !empty($fieldProductValue['value']) || $fieldProductValue['value'] === '0') {
                        $sqlFieldProductValue = '\'%' . $fieldProductValue['value'] . '%\'';
                    }

                    if (!empty($sqlFieldProductValue)) {
                        $sql = '`value` = ANY (SELECT value
                         FROM `field_product_value`
                         WHERE value LIKE ' . $sqlFieldProductValue . ' and `field_id` = ' . $fieldId . ')';
                        if ($i === 0) {
                            $query->andWhere($sql);
                            $i++;
                        } else {
                            $query->orWhere($sql);
                        }
                    }
                }
            }
        }

        if (isset($params['sort']) && stristr($params['sort'], 'FieldProductValue') == true) {
            $sortFieldProductValue = $params['sort'];
            if (stristr($sortFieldProductValue, '-')) {
                $sortFieldProductValue[0] = ' ';
                $sortFieldProductValue = trim($sortFieldProductValue);
            }
            $dataProvider->setSort([
                'attributes' =>
                    ArrayHelper::merge($dataProvider->sort->attributes,
                        [
                            $sortFieldProductValue
                            => [
                                'asc' => ['field_product_value.value' => SORT_ASC],
                                'desc' => ['field_product_value.value' => SORT_DESC],
                            ],
                        ]),
            ]);
        }

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'product.id' => $this->id,
            'product.category_id' => $this->category_id,
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

        return $dataProvider;
    }
}
