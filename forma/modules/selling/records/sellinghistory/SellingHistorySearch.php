<?php

namespace forma\modules\selling\records\sellinghistory;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\selling\records\sellinghistory\SellingHistory;

/**
 * SellingHistorySearch represents the model behind the search form about `forma\modules\selling\records\selling-history\SellingHistory`.
 */
class SellingHistorySearch extends SellingHistory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'count'], 'integer'],
            [['date', 'date_from', 'date_to'], 'safe'],
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
        $query = \forma\modules\selling\records\sellinghistory\SellingHistory::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'count' => $this->count,
        ]);
        if(isset ($this->date)&&$this->date!=''){
            $date=explode(" - ",$this->date);
            $dateFrom=trim($date[0]);
            $dateTo=trim($date[1]);
            $query->andFilterWhere(['between','date',$dateFrom,$dateTo]);
        }

        return $dataProvider;
    }
}
