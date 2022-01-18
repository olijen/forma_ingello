<?php

namespace forma\modules\core\records;

/**
 * This is the ActiveQuery class for [[Rank]].
 *
 * @see Rank
 */
class RankQuery extends \yii\db\ActiveQuery
{
    public function getAccessoryIdS()
    {
        $accessRank = Accessory::find()->where(['user_id' => \Yii::$app->user->id])
            ->andWhere(['like', 'entity_class', ['\Rank']])->select('entity_id')
            ->all();
        $idS = [];
        foreach ($accessRank as $key => $item) {
            $idS [] = $item->entity_id;
        }
        return $idS;
    }
    /**
     * @inheritdoc
     * @return Rank[]|array
     */
    public function allAccessory($db = null)
    {
        $this->andWhere(['in', 'rank.id', $this->getAccessoryIdS()]);
        return parent::all($db);
    }

    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Rank|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}