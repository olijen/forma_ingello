<?php

namespace forma\modules\selling\services;

use forma\modules\core\records\User;
use forma\modules\customer\records\Customer;
use forma\modules\selling\records\selling\Selling;
use forma\modules\selling\records\state\State;
use yii;

class SuperSellingImportService
{
    /**
     * Константы для столбцов таблицы
     */
    const CUSTOMER_NAME_INDEX  = 0;
    const CUSTOMER_PHONE_INDEX = 1;
    const STATE_INDEX          = 2;

    public $arrayFileData;
    public $arrayIdNewCustomersAndState;
    public $currentUser;
    public $findStates;
    public $newState;

    function __construct(array $arrayFileData)
    {
        $this->arrayFileData = $arrayFileData;
        $this->createCustomer();
        $this->currentUser = User::find()->where(['id' => Yii::$app->user->id])->one();
        $this->findStates = State::find()->where(['user_id' => $this->currentUser->id])->all();
        $this->createSelling();
    }

    /**
     * Метод создания клиентов
     */
    public function createCustomer()
    {
        $i = 1;
        while ($i < count($this->arrayFileData)) {
            $j = 0;
            $state = null;
            $name = null;
            $phone = null;

            while ($j < count($this->arrayFileData[$i])) {
                if ($j == SuperSellingImportService::CUSTOMER_NAME_INDEX) {
                    $name = $this->arrayFileData[$i][$j];
                }

                if ($j == SuperSellingImportService::CUSTOMER_PHONE_INDEX) {
                    if (isset($this->arrayFileData[$i][$j])) {
                        if ($this->arrayFileData[$i][$j] !== "(не задано)") {
                            $phone = $this->arrayFileData[$i][$j];
                        }
                    }
                }

                if ($j == SuperSellingImportService::STATE_INDEX) {
                    if (isset($this->arrayFileData[$i][$j])) {
                        if ($this->arrayFileData[$i][$j] !== "(не задано)") {
                            $state = $this->arrayFileData[$i][$j];
                        }
                    }
                }
                $j++;
            }

            $newCustomer = new Customer();
            $newCustomer->name = $name;
            $newCustomer->chief_phone = $phone;
            if ($newCustomer->save()) {
                $this->arrayIdNewCustomersAndState [] = ['customer_id' => $newCustomer->id, 'state_name' => $state];
            }
            $i++;
        }
    }

    /**
     * Метод создание продаж для клиентов
     */
    public function createSelling()
    {
        foreach ($this->arrayIdNewCustomersAndState as $idNewUserAndState) {
            $newSelling = new Selling();
            foreach ($this->findStates as $findState) {
                if ($findState->name == $idNewUserAndState['state_name']) {
                    $newSelling->state_id = $findState->id;
                    break;
                }
            }

            $newSelling->customer_id = $idNewUserAndState['customer_id'];
            $newSelling->date_create = date('Y-m-d');
            $newSelling->save();
            if (empty($newSelling->state_id)) {
                $newSelling->state_id = $this->findStates[0]->id;
                $this->newState [] = ['state_name' => $this->findStates[0]->name, 'selling_id' => $newSelling->id];
            }
            $newSelling->save();
        }
    }

    /**
     * Метод вывода предупреждений по состояниям
     */
    public function getSellingOneState()
    {
        return $this->newState;
    }
}