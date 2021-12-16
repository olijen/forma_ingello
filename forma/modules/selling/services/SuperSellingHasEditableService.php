<?php

namespace forma\modules\selling\services;

use forma\modules\customer\records\Customer;
use forma\modules\selling\records\selling\Selling;
use forma\modules\selling\records\state\State;
use phpDocumentor\Reflection\Types\Object_;

/**
 * Этот сервис для редактирования данных из супер таблицы продаж".
 *
 * @property integer $sellingId
 * @property Selling $selling
 * @property integer $index
 * @property string $editableAttribute
 * @property Customer $customer
 * @property State $state
 */
class SuperSellingHasEditableService
{
    private $sellingId;
    private $selling;
    private $index;
    private $editableAttribute;
    private $customer;
    private $state;
    private $requestSelling;

    public function editColumn()
    {
        $this->selling = Selling::find()->where(['id' => $this->sellingId])->one();
        $this->customer = Customer::find()->where(['id' => $this->selling->customer_id])->one();
        $this->state = State::find()->where(['id' => $this->requestSelling[$this->index][$this->editableAttribute]])->one();
        if (strpos($this->editableAttribute, 'customer') !== false) {
            if($this->editableAttribute == 'customerName'){
                $this->customer->name = $this->requestSelling[$this->index][$this->editableAttribute];
            }
            if($this->editableAttribute == 'chief_phone'){
                $this->customer->chief_phone = $this->requestSelling[$this->index][$this->editableAttribute];
            }
            if ($this->customer->validate() && $this->customer->save()) {
                return true;
            }
        }
        if (strpos($this->editableAttribute, 'state') !== false) {
            $this->selling->state_id = $this->state->id;
            $this->requestSelling[$this->index][$this->editableAttribute] = $this->state->name;
            if ($this->selling->validate() && $this->selling->save()) {
                return $this->requestSelling[$this->index][$this->editableAttribute];
            }
        }
        return true;
    }

    public function setAttribute(int $sellingId, int $index, string $editableAttribute,array $requestSelling)
    {
        $this->sellingId = $sellingId;
        $this->index = $index;
        $this->editableAttribute = $editableAttribute;
        $this->requestSelling = $requestSelling;
    }
}
