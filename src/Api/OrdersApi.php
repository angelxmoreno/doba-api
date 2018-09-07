<?php

namespace Axm\DobaApi\Api;

use Axm\DobaApi\Entity\Order;
use Axm\DobaApi\Factories\OrderFactory;
use Axm\DobaApi\Factories\OrdersResponseFactory;
use Axm\DobaApi\Response\OrdersResponse;

/**
 * Class OrdersApi
 * @package Axm\DobaApi\Api
 */
class OrdersApi extends ApiBase
{

    /**
     * @param array $options
     * @return OrdersResponse
     * @throws \Axm\DobaApi\DobaResponseException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function getOrders(array $options = []) : OrdersResponse
    {
        $response = $this->getRequest()->call('getOrders', $options);

        return OrdersResponseFactory::fromData($response);
    }

    /**
     * @param array $options
     * @return Order[]
     * @throws \Axm\DobaApi\DobaResponseException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function getOrderDetail($options = []) : array
    {
        $response = $this->getRequest()->call('getOrderDetail', $options);

        return OrderFactory::fromArrayOfData($response);
    }

    public function orderLookup() : array
    {
        throw new \BadMethodCallException('orderLookup is not yet implemented');
    }

    public function createOrder() : array
    {
        throw new \BadMethodCallException('createOrder is not yet implemented');
    }

    public function fundOrder() : array
    {
        throw new \BadMethodCallException('fundOrder is not yet implemented');
    }
}
