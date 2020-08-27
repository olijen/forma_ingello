<?php

namespace forma\modules\core\records;

/**
 * This is the ActiveQuery class for [[\forma\modules\core\records\regularity\Regularity]].
 *
 * @see \forma\modules\core\records\regularity\Regularity
 */
class RegularityQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \forma\modules\core\records\regularity\Regularity[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \forma\modules\core\records\regularity\Regularity|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function publicRegularities($currentUserId = null)
    {
        if (!is_null($currentUserId)){
            $this->where(['access' => 1, 'user_id' => $currentUserId])
                ->orderBy(['order' => SORT_ASC, 'id' => SORT_ASC]);
        }else{
            $this->where(['access' => 1, 'user_id' => \Yii::$app->user->id])
                ->orderBy(['order' => SORT_ASC, 'id' => SORT_ASC]);
        }

        return $this;
    }
}