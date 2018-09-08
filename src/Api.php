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
    protected $client;

    /**
     * Api constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getOrders()
    {
        throw new \BadMethodCallException('getOrders is not yet implemented');
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
