<?php

namespace Axm\DobaApi;

/**
 * Class Api
 * @package Axm\DobaApi
 */
class Api
{
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


    public function getOrders(array $options = [])
    {
        return $this->order_client->call('getOrders', $options);
    }

    public function getOrderDetail()
    {
        throw new \BadMethodCallException('getOrderDetail is not yet implemented');
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

    public function getSuppliers()
    {
        throw new \BadMethodCallException('getSuppliers is not yet implemented');
    }

    public function searchCatalog()
    {
        throw new \BadMethodCallException('searchCatalog is not yet implemented');
    }

    public function getProductDetail()
    {
        throw new \BadMethodCallException('getProductDetail is not yet implemented');
    }

    public function getProductInventory()
    {
        throw new \BadMethodCallException('getProductInventory is not yet implemented');
    }

    public function getListsSummary()
    {
        throw new \BadMethodCallException('getListsSummary is not yet implemented');
    }

    public function editList()
    {
        throw new \BadMethodCallException('editList is not yet implemented');
    }
}
