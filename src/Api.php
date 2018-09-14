<?php

namespace Axm\DobaApi;

use Cake\Utility\Hash;
use Psr\SimpleCache\CacheInterface;

/**
 * Class Api
 * @package Axm\DobaApi
 *
 * @method array getSuppliers(array $options = [])
 * @method array searchCatalog(array $options = [])
 * @method array getProductDetail(array $options = [])
 * @method array getProductInventory(array $options = [])
 * @method array getListsSummary(array $options = [])
 * @method array editList(array $options = [])
 * @method array orderLookup(array $options = [])
 * @method array createOrder(array $options = [])
 * @method array fundOrder(array $options = [])
 * @method array getOrderDetail(array $options = [])
 * @method array getOrders(array $options = [])
 */
class Api
{
    public const CACHE_TTL_KEY = 'ttl';
    public const DEFAULT_CACHE_TTL = 300;

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
     * @var CacheInterface
     */
    protected $cache;

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

    /**
     * @param string $method
     * @param array $arguments
     * @return array
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function __call($method, $arguments)
    {
        if (!in_array($method, self::ORDER_METHODS) && !in_array($method, self::PRODUCT_METHODS)) {
            throw new \BadMethodCallException("Method {$method} does not exist");
        }

        return $this->callClient($method, $arguments);
    }

    /**
     * @param string $method
     * @param array $arguments
     * @return array
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    protected function callClient(string $method, array $arguments) : array
    {
        $cache_ttl = Hash::get($arguments, self::CACHE_TTL_KEY, self::DEFAULT_CACHE_TTL);

        return ($this->cache && $cache_ttl)
            ? $this->callCached($method, $arguments, $cache_ttl)
            : $this->callRaw($method, $arguments);
    }

    protected function callRaw(string $method, array $arguments) : array
    {
        $client = in_array($method, self::ORDER_METHODS)
            ? $this->order_client
            : $this->product_client;

        array_unshift($arguments, $method);

        return call_user_func_array([$client, 'call'], $arguments);
    }

    /**
     * @param string $method
     * @param array $arguments
     * @param int $ttl
     * @return array
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    protected function callCached(string $method, array $arguments, int $ttl) : array
    {
        $cache_key = $this->getCacheKey($method, $arguments);

        if ($this->cache->has($cache_key)) {
            return $this->cache->get($cache_key);
        }

        $response = $this->callRaw($method, $arguments);
        $this->cache->set($cache_key, $response, $ttl);

        return $response;
    }

    /**
     * @param CacheInterface $cache
     */
    public function setCache(CacheInterface $cache) : void
    {
        $this->cache = $cache;
    }

    protected function getCacheKey(string $method, array $arguments) : string
    {
        return md5($method . serialize($arguments));
    }
}
