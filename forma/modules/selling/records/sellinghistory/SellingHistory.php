<?php

namespace forma\modules\selling\records\sellinghistory;

use forma\components\AccessoryActiveRecord;
use forma\modules\core\components\NomenclatureInterface;
use Yii;

/**
* This is the model class for table "selling_history".
*
  * @property integer $id
  * @property string $date
  * @property string $date_from
  * @property string $date_to
  * @property integer $count
*/
class SellingHistory extends AccessoryActiveRecord
{


  /**
  * @inheritdoc
  */
  public static function tableName()
  {
    return 'selling_history';
  }

  /**
  * @inheritdoc
  */
  public function behaviors()
  {
    return [
          ];
  }

  /**
  * @inheritdoc
  */
  public function rules()
  {
    return [
            [['date', 'date_from', 'date_to'], 'safe'],
            [['date','date', 'format' => 'dd.MM.yyyy'], 'safe'],
            [['count'], 'integer']
        ];
  }

  /**
  * @inheritdoc
  */
  public function attributeLabels()
  {
    return [
        'id' => 'ID',
        'date' => 'Date',
        'date_from' => 'Date From',
        'date_to' => 'Date To',
        'count' => 'Count',
    ];
  }
  
  /**
  * @inheritdoc
  * @return \forma\modules\selling\records\sellinghistory\SellingHistoryQuery the active query used by this AR class.
  */
  public static function find()
  {
  return new \forma\modules\selling\records\sellinghistory\SellingHistoryQuery (get_called_class());
  }

}
