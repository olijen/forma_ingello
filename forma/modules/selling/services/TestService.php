<?php
namespace forma\modules\selling\services;

use forma\modules\customer\records\Customer;
use forma\modules\selling\records\selling\Selling;
use forma\modules\warehouse\records\Warehouse;

class TestService
{

    /**
     * @param array $customerData
     * @return array
     */
    public static function completeTest(array $customerData) : array
    {
        $customer = self::createCustomer($customerData);
        $selling = self::createSelling($customer);

        return ['customer' => $customer, 'sellingToken' => $selling->selling_token];
    }

    /**
     * @param array $customerData
     * @return Customer
     */
    private static function createCustomer(array $customerData) : Customer
    {
        $customer = new Customer();
        $customer->name = $customerData['name'];
        $customer->chief_email = $customerData['chief_email'];
        $customer->description = $customerData['description'];
        $customer->save();

        return $customer;
    }

    /**
     * @param Customer $customer
     * @return Selling
     */
    private static function createSelling(Customer $customer) : Selling
    {
        $warehouse = Warehouse::getMyWarehouses(true);
        $dataForSelling = [
            'Selling' => [
                'warehouse_id' => $warehouse->id,
                'customer_id' => $customer->id
            ]
        ];
        $selling = SellingService::save(null, $dataForSelling);

        return $selling;
    }
}