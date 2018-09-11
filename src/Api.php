<?php

namespace Axm\DobaApi;

/**
 * Class Api
 * @package Axm\DobaApi
 */
class Api
{
    public const PRODUCT_METHODS = [
        'getSuppliers',
        'searchCatalog',
        'getProductDetail',
        'getProductInventory',
        'getListsSummary',
        'editList'
    ];

    public const ORDER_METHODS = [
        'orderLookup',
        'createOrder',
        'fundOrder',
        'getOrderDetail',
        'getOrders'
    ];

    /**
     * @var Client
     */
    protected $order_client;

    /**
     * @var Client
     */
    protected $product_client;

    /**
     * Api constructor.
     * @param Client $order_client
     * @param Client $product_client
     */
    public function __construct(Client $order_client, Client $product_client)
    {
        $this->order_client = $order_client;
        $this->product_client = $product_client;
    }

    public function __call($method, $arguments)
    {
        if (!in_array($method, self::ORDER_METHODS) && !in_array($method, self::PRODUCT_METHODS)) {
            throw new \BadMethodCallException("Method {$method} does not exist");
        }

        $client = in_array($method, self::ORDER_METHODS)
            ? $this->order_client
            : $this->product_client;
        array_unshift($arguments, $method);

        return call_user_func_array([$client, 'call'], $arguments);
    }
}
