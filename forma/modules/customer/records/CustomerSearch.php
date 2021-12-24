<?php

namespace forma\modules\customer\records;

use forma\modules\core\records\User;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\customer\records\Customer;

/**
 * CustomerSearch represents the model behind the search form about `forma\modules\customer\records\Customer`.
 */
class CustomerSearch extends Customer
{
    public $customer_source;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'country_id','customer_source_id',], 'integer'],
            [
                [
                    'name',
                    'firm',
                    'address',
                    'company_email',
                    'chief_phone',
                    'state',
                    'telegram',
                    'skype',
                    'whatsapp',
                    'viber',
                    'customer_source',
                    'customer_source_id',
                ],
                'safe'
            ],
            [['tax_rate'], 'number'],
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
        $query = Customer::find();
        $this->access($query);
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
            'tax_rate' => $this->tax_rate,
            'country_id' => $this->country_id,
        ]);


        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'firm', $this->firm])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'company_email', $this->company_email])
            ->andFilterWhere(['like', 'telegram', $this->telegram])
            ->andFilterWhere(['like', 'chief_phone', $this->chief_phone])
            ->andFilterWhere(['like', 'skype', $this->skype])
            ->andFilterWhere(['like', 'whatsapp', $this->whatsapp])
            ->andFilterWhere(['like', 'viber', $this->viber])
            ->andFilterWhere(['like', 'customer_source_id', $this->customer_source_id])
        ;

        return $dataProvider;
    }
}
