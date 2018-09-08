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

    public function getOrders(array $options = [])
    {
        throw new \BadMethodCallException('getOrders is not yet implemented');
    }

    public function getOrderDetail(array $options = [])
    {
        throw new \BadMethodCallException('getOrderDetail is not yet implemented');
    }

    public function orderLookup(array $options = []) : array
    {
        throw new \BadMethodCallException('orderLookup is not yet implemented');
    }

    public function createOrder(array $options = []) : array
    {
        throw new \BadMethodCallException('createOrder is not yet implemented');
    }

    public function fundOrder(array $options = []) : array
    {
        throw new \BadMethodCallException('fundOrder is not yet implemented');
    }

    public function getSuppliers(array $options = [])
    {
        throw new \BadMethodCallException('getSuppliers is not yet implemented');
    }

    public function searchCatalog(array $options = [])
    {
        throw new \BadMethodCallException('searchCatalog is not yet implemented');
    }

    public function getProductDetail(array $options = [])
    {
        throw new \BadMethodCallException('getProductDetail is not yet implemented');
    }

    public function getProductInventory(array $options = [])
    {
        throw new \BadMethodCallException('getProductInventory is not yet implemented');
    }

    public function getListsSummary(array $options = [])
    {
        throw new \BadMethodCallException('getListsSummary is not yet implemented');
    }

    public function editList(array $options = [])
    {
        throw new \BadMethodCallException('editList is not yet implemented');
    }
}
