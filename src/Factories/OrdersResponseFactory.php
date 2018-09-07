<?php

namespace Axm\DobaApi\Factories;

use Axm\DobaApi\Response\OrdersResponse;
use Cake\Utility\Hash;

/**
 * Class OrdersResponseFactory
 * @package Axm\DobaApi\Factories
 */
class OrdersResponseFactory extends FactoryBase
{
    /**
     * @param array $data
     * @return OrdersResponse
     */
    public static function fromData(array $data) : OrdersResponse
    {
        $ordersResponse = new OrdersResponse();
        $ordersResponse->setResultTotal((int)Hash::get($data, 'result_total', 0));
        $ordersResponse->setOverallNumberOfOrders((int)Hash::get($data, 'overall_number_of_orders', 0));
        $ordersResponse->setOverallTotalSpent((float)Hash::get($data, 'overall_total_spent', 0));

        $ordersResponse->setOrders(OrderFactory::fromArrayOfData($data));

        return $ordersResponse;
    }
}