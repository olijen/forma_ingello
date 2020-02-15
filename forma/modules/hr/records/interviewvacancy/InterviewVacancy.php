<?php

namespace forma\modules\hr\records\interviewvacancy;

use forma\modules\hr\records\interview\Interview;
use forma\modules\hr\records\interviewvacancy\InterviewVacancyQuery;
use forma\modules\vacancy\records\Vacancy;
use Yii;
use forma\modules\product\records\Currency;
use forma\modules\product\records\Product;
use forma\modules\product\records\PackUnit;
use forma\modules\warehouse\services\RemainsService;
use yii\db\ActiveRecord;
use forma\modules\overheadcost\records\OverheadCost;

/**
 * This is the model class for table "selling_product".
 *
 * @property integer $id
 * @property integer $vacancy_id
 * @property integer $interview_id
 * @property integer $quantity
 * @property integer $currency_id
 * @property integer $pack_unit_id
 * @property integer $overhead_cost_id
 *
 * @property Vacancy $vacancy
 * @property Interview $interview
 * @property PackUnit $packUnit
 * @property Currency $currency
 * @property OverheadCost $overheadCost
 */
class InterviewVacancy extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @inheritdoc
     */
    public function getVacancyId()
    {
        return $this->vacancy_id;
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'interview_vacancy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vacancy_id', 'interview_id', 'quantity', 'currency_id'], 'required'],
            [['vacancy_id', 'interview_id', 'quantity', 'overhead_cost_id', 'cost_type'], 'integer'],
            [['vacancy_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['vacancy_id' => 'id']],
            [['interview_id'], 'exist', 'skipOnError' => true, 'targetClass' => Interview::className(), 'targetAttribute' => ['interview_id' => 'id']],
            [['cost'], 'number'],
            [['quantity'], 'validateAvailability'],
        ];
    }

    public function validateAvailability($attribute, $params, $validator)
    {
        if (!$this->vacancy_id) {
            return false;
        }

        /** @var integer $availableProductQty */
        $availableProductQty = RemainsService::getAvailable(
            $this->vacancy_id,
            $this->interview->getRelatedProject()->id
        );

        if (!$this->isNewRecord) {
            $availableProductQty += static::findOne($this->id)->quantity;
        }

        if ($this->quantity > $availableProductQty) {
            $this->addError('quantity', "Доступное количество товара - $availableProductQty");
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vacancy_id' => 'Товар',
            'interview_id' => 'Найм',
            'quantity' => 'Количество',
            'cost' => 'Стоимость',
            'overhead_cost_id' => 'Накладной расход',
            'cost_type' => 'Тип стоимости',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancy()
    {
        return $this->hasOne(Vacancy::className(), ['id' => 'vacancy_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInterview()
    {
        return $this->hasOne(Interview::className(), ['id' => 'interview_id']);
    }

    /**
     * @inheritdoc
     * @return InterviewVacancyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InterviewVacancyQuery(get_called_class());
    }

//    public function getVacancyCategoryName()
//    {
//        return $this->vacancy->category->name;
//    }

    public function getVacancyManufacturerName()
    {
        return $this->vacancy->manufacturer->name;
    }

    public function getVacancyTitle()
    {
        return $this->vacancy->title;
    }

    public function getInterviewName()
    {
        return $this->interview->name;
    }

    public function getCurrencyLabel()
    {
        if ($this->vacancy->type_id === Product::WINE_TYPE_ID) {
            return '€';
        } elseif ($this->vacancy->type_id === Product::BOOZE_TYPE_ID) {
            return '$';
        }
        return '';
    }

    public function getCostLabel()
    {
        if (!$this->cost) {
            return null;
        }
        return $this->getCurrencyLabel() . $this->cost;
    }

    /**
     * @inheritdoc
     */
    public function getOverheadCost()
    {
        return $this->hasOne(OverheadCost::className(), ['id' => 'overhead_cost_id']);
    }

    public static function getCostTypes()
    {
        return [
            0 => 'Розница',
            1 => 'Опт',
        ];
    }

    public function getCostTypeLabel()
    {
        if (is_null($this->cost_type)) {
            return null;
        }

        return static::getCostTypes()[$this->cost_type];
    }

    public function getPackUnitId()
    {
        return $this->product ? $this->product->pack_unit_id : null;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPackUnit()
    {
        return $this->hasOne(PackUnit::className(), ['id' => 'pack_unit_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(Currency::className(), ['id' => 'currency_id']);
    }
}
