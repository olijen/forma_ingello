<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 04.11.18
 * Time: 14:12
 */

namespace forma\widgets;

use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\db\ActiveRecord;
use yii\helpers\Html;
use kartik\daterange\DateRangePicker;
use forma\components\DateRangeHelper;

/**
 * Class DateRangeFilter
 * @package forma\widgets
 *
 * @property ActiveRecord $searchModel
 */
class DateRangeFilter extends Widget
{
    public $attribute;

    public $searchModel;

    public function run()
    {
        if (empty($this->attribute)) {
            throw new InvalidConfigException('You must setup a "attribute" option');
        }
        if (empty($this->searchModel)) {
            throw new InvalidConfigException('You must setup a "searchModel" option');
        }

        $rangeAttribute = $this->attribute . 'Range';

        if (!$this->searchModel->hasProperty($rangeAttribute)) {
            throw new InvalidConfigException('You must setup a "' . $rangeAttribute . '" attribute into ' . $this->searchModel::className());
        }

        $rangeName = Html::getInputName($this->searchModel, $rangeAttribute);

        return DateRangePicker::widget([
            'name' => $rangeName,
            'presetDropdown' => true,
            'pluginOptions' => [
                'locale' => ['format' => 'DD.MM.Y'],
            ],
            'value' => DateRangeHelper::getDateRangeValue($this->attribute, $this->searchModel),
        ]);
    }
}
