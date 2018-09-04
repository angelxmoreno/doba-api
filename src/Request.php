<?php

namespace Axm\DobaApi;

use Cake\Utility\Hash;
use Cake\Utility\Xml;
use GuzzleHttp\Client as GuzzleClient;
use Psr\SimpleCache\CacheInterface;
use Rakshazi\GetSetTrait;

/**
 * Class Request
 * @package Axm\DobaApi
 *
 * @method Auth getAuth()
 * @method void setAuth(Auth $auth)
 * @method GuzzleClient getHttpClient()
 * @method void setHttpClient(GuzzleClient $httpClient)
 * @method CacheInterface getCacheEngine()
 * @method void setCacheEngine(CacheInterface $cacheEngine)
 * @method bool getCache()
 * @method void setCache(bool $cache)
 */
class Request
{
    use GetSetTrait;

    const SANDBOX_URL = 'https://sandbox.doba.com';
    const PRODUCTION_URL = 'https://doba.com';
    const URI = '/api/20110301/xml_retailer_api.php';

    /**
     * @var Auth
     */
    protected $auth;

    /**
     * @var bool
     */
    protected $is_dev = true;

    /**
     * @var GuzzleClient
     */
    protected $httpClient;

    /**
     * @var CacheInterface
     */
    protected $cacheEngine;

    /**
     * @var bool
     */
    protected $cache = true;

    /**
     * Request constructor.
     * @param Auth $auth
     * @param GuzzleClient $httpClient
     * @param bool $dev_mode
     * @param CacheInterface $cacheEngine
     */
    public function __construct(
        Auth $auth,
        GuzzleClient $httpClient,
        bool $dev_mode = true,
        CacheInterface $cacheEngine = null
    ) {
        $this->setAuth($auth);
        $this->setHttpClient($httpClient);
        $this->setDev($dev_mode);
        $this->setCacheEngine($cacheEngine);
        $this->setCache(!!$this->getCacheEngine());
    }

    /**
     * @return bool
     */
    public function isDev() : bool
    {
        return $this->is_dev;
    }

    /**
     * @param bool $is_dev
     */
    public function setDev(bool $is_dev) : void
    {
        $this->is_dev = $is_dev;
    }

    /**
     *
     * @param string $action
     * @param array $extras
     * @return array
     * @throws DobaResponseException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function call(string $action, array $extras = [])
    {
        $url = $this->buildRequestUrl();

        $cacheKey = 'doba.' . $action . '.extra_' . md5($url . serialize($extras));

        if ($this->getCache() && $this->getCacheEngine()->has($cacheKey)) {
            return $this->getCacheEngine()->get($cacheKey);
        }

        $xml = $this->buildRequestBody($action, $extras);

        $response = $this->getHttpClient()->request('POST', $url, ['body' => $xml]);

        $body = $response->getBody()->getContents();
        $data = Xml::toArray(Xml::build($body));

        $this->checkForError($data);

        $response_data = Hash::get($data, 'dce.response', []);

        if ($this->getCache()) {
            $this->getCacheEngine()->set($cacheKey, $response_data);
        }

        return $response_data;
    }

    public function buildRequestBody(string $action, array $extras = []) : string
    {
        $xml = Xml::fromArray(['dce' => []]);
        $request = $xml->addChild('request');

        $authentication = $request->addChild('authentication');
        $authentication->addChild('username', $this->getAuth()->getUsername());
        $authentication->addChild('password', $this->getAuth()->getPassword());

        $request->addChild('retailer_id', $this->getAuth()->getRetailerId());
        $request->addChild('action', $action);

        foreach ($extras as $key => $val) {
            if (is_array($val)) {
                list($outer, $inner) = explode('.', $key);
                $container = $request->addChild($outer);
                foreach ($val as $child) {
                    $container->addChild($inner, $child);
                }
            } else {
                $request->addChild($key, $val);
            }
        }

        return $xml->asXML();
    }

    protected function buildRequestUrl() : string
    {
        $prefix = ($this->isDev())
            ? self::SANDBOX_URL
            : self::PRODUCTION_URL;

        return $prefix . self::URI;
    }

    /**
     * @param array $data
     * @throws DobaResponseException
     */
    protected function checkForError(array $data)
    {
        $error = Hash::get($data, 'error', false);
        if ($error) {
            throw DobaResponseException::fromErrorArray($error);
        }

        $outcome = Hash::get($data, 'dce.response.outcome', 'ok');
        if ($outcome === 'failure' && $error = Hash::get($data, 'dce.response.error', false)) {
            throw DobaResponseException::fromErrorArray($error);
        }
    }
}
