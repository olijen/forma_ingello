<?php

namespace forma\modules\core\records;

/**
 * This is the ActiveQuery class for [[Rule]].
 *
 * @see Rule
 */
class RuleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/
    public function getAccessoryIdS()
    {
        $accessRule = Accessory::find()->where(['user_id' => \Yii::$app->user->id])
            ->andWhere(['like', 'entity_class', ['\Rule']])->select('entity_id')
            ->all();
        $idS = [];
        foreach ($accessRule as $key => $item) {
            $idS [] = $item->entity_id;
        }
        return $idS;
    }
    /**
     * @inheritdoc
     * @return Rule[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Rule|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function oneAccessory($db = null)
    {
        $this->andWhere(['in', 'rule.id', $this->getAccessoryIdS()]);
        return parent::one($db);
    }
}