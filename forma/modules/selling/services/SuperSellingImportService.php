<?php

namespace forma\modules\selling\services;

use forma\modules\core\records\User;
use forma\modules\customer\records\Customer;
use forma\modules\selling\records\selling\Selling;
use forma\modules\selling\records\state\State;
use yii;

class SuperSellingImportService
{

    public $arrayFileData;
    public $errors;
    public $info;

    function __construct(array $arrayFileData)
    {
        $this->arrayFileData = $arrayFileData;
        $this->geCustomerWithSellingColumns();
    }

    public function getAttributeTableByName($nameAttribute)
    {
        foreach ((new Customer())->attributeLabels() as $key => $attributeTable) {
            if ($attributeTable === $nameAttribute) {
                return $key;
            }
        }

        foreach ((new Selling())->attributeLabels() as $key => $attributeTable) {
            if ($attributeTable === $nameAttribute) {
                return $key;
            }
        }

        return false;
    }

    public function getClassByAttrTable($keyTableColumn)
    {
        foreach ((new Customer())->attributeLabels() as $key => $attributeTable) {
            if ($key === $keyTableColumn) {
                return Customer::className();
            }
        }

        foreach ((new Selling())->attributeLabels() as $key => $attributeTable) {
            if ($key === $keyTableColumn) {
                return Selling::className();
            }
        }

        return false;
    }

    public function getNameAttrByIndex($index){
        foreach ($this->arrayFileData[0] as $keyIndex => $nameAttr) {
            if ($keyIndex === $index) {
                return $nameAttr;
            }
        }

        return  false;
    }


    public function geCustomerWithSellingColumns()
    {
        $arrayWithoutHeader = [];

        foreach ($this->arrayFileData as $keyIndexFile => $fileDatum) {
            if ($keyIndexFile === 0) {
                continue;
            }
            $arrayWithoutHeader [] = $fileDatum;
        }

        $resetArrayTable = [];
        foreach ($arrayWithoutHeader as $key => $columnValues) {
            $arrayValueColumnAndKeyAttr = [];
            foreach ($columnValues as $indexColumn => $columnValue) {
                $arrayValueColumnAndKeyAttr [$this->getClassByAttrTable($this->getAttributeTableByName($this->getNameAttrByIndex($indexColumn)))][$this->getAttributeTableByName($this->getNameAttrByIndex($indexColumn))] = $columnValue;
            }
            $resetArrayTable [] = $arrayValueColumnAndKeyAttr;
        }
        $this->allValidate($resetArrayTable);
    }

    public  function allValidate($arrayCustomersWithSelling)
    {
        foreach ($arrayCustomersWithSelling as $key => $customersSelling) {
            $beforeSaveCustomer ['Customer'] = $customersSelling[Customer::className()];
            $customer = new Customer();
            $customer->load($beforeSaveCustomer);
            $beforeSaveSelling = $customersSelling[Selling::className()];
            $selling = new Selling();
            $selling->load($beforeSaveSelling);

            if ($customer->validate() == false) {
                $this->errors [$key] = $customer->errors;
            }

            if (!$selling->validate() == false) {
                $this->errors [$key] = $customer->errors;
            }
        }

        if (empty($this->errors)) {
            $this->validateArrayFile($arrayCustomersWithSelling);
        }
    }

    public function validateArrayFile($arrayCustomersWithSelling)
    {
        $stateByUser = State::find()->where(['user_id' => Yii::$app->user->id])->one();

        foreach ($arrayCustomersWithSelling as $key => $customersSelling) {
            $beforeSaveCustomer ['Customer'] = $customersSelling[Customer::className()];
            $customer = new Customer();
            $customer->load($beforeSaveCustomer);
            if ($customer->validate()) {
                if ($customer->save()) {
                    $beforeSaveSelling = $customersSelling[Selling::className()];
                    $selling = new Selling();
                    $selling->load($beforeSaveSelling);
                    $selling->customer_id = $customer->id;
                    if ($selling->validate()) {
                        $tempInfo = [];
                        if ($selling->selling_token === null) {
                            $selling->date_create = date('Y-m-d');
                            $tempInfo ['date_create'] = "Добавлена текущая дата ";
                        }

                        if ($selling->selling_token === null) {
                            $selling->selling_token = Yii::$app->getSecurity()->generateRandomString();
                            $tempInfo ['selling_token'] = "Сгенерирован токен " . $selling->selling_token;
                        }

                        if ($selling->state_id === null) {
                            $selling->state_id = $stateByUser->id;
                            $tempInfo ['state'] = "Добавлено состояние " . $stateByUser->name;
                        }

                        $selling->save();
                        if (!empty($tempInfo)) {
                            $this->info [$selling->id] = $tempInfo;
                        }
                    } else {
                        $this->errors [$key] = $selling->errors;
                    }
                }
            } else {
                $this->errors [$key] = $customer->errors;
            }
        }
    }

    public function isError()
    {
        if (empty($this->errors)) {
            return ['info' => $this->info];
        } else {
            return ['errors' => $this->errors];
        }
    }
}