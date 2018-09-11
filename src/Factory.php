<?php

namespace Axm\DobaApi;

/**
 * Class Factory
 * @package Axm\DobaApi
 */
class Factory
{
    public const PRODUCT = 'product';
    public const ORDER = 'order';

    protected const VALID_TYPES = [
        self::PRODUCT,
        self::ORDER
    ];

    public const PRODUCT_WSDL_URL_DEV = 'https://sandbox.doba.com/soap/20110301/wsdl/ApiRetailerSearch.wsdl';
    public const ORDER_WSDL_URL_DEV = 'https://sandbox.doba.com/soap/20110301/wsdl/ApiRetailerOrder.wsdl';
    public const PRODUCT_WSDL_URL = 'https://www.doba.com/soap/20110301/wsdl/ApiRetailerSearch.wsdl';
    public const ORDER_WSDL_URL = 'https://www.doba.com/soap/20110301/wsdl/ApiRetailerOrder.wsdl';

    public static function buildApi(
        string $username,
        string $password,
        string $retailer_id,
        bool $dev_mode = true
    ) : Api {
        $auth = new Auth($username, $password, $retailer_id);

        $order_client = new Client($auth);
        $order_client->setWsdlUrl(self::getWsdlUrl(self::ORDER, $dev_mode));

        $product_client = new Client($auth);
        $product_client->setWsdlUrl(self::getWsdlUrl(self::PRODUCT, $dev_mode));

        $api = new Api($order_client, $product_client);

        return $api;
    }

    public static function buildClient(
        string $username,
        string $password,
        string $retailer_id,
        string $type = Factory::PRODUCT,
        bool $dev_mode = true
    ) : Client {
        self::ensureValidType($type);
        $wsdl_url = self::getWsdlUrl($type, $dev_mode);

        $auth = new Auth($username, $password, $retailer_id);
        $client = new Client($auth);
        $client->setWsdlUrl($wsdl_url);

        return $client;
    }

    protected static function ensureValidType(string $type)
    {
        if (!in_array($type, self::VALID_TYPES)) {
            throw new \InvalidArgumentException(sprintf(
                "'%s' is not a valid client type. Use '%s' or '%s'",
                $type,
                self::PRODUCT,
                self::ORDER
            ));
        }
    }

    public static function getWsdlUrl(string $type, bool $dev_mode) : string
    {
        switch ($type . ':' . (string)$dev_mode) {
            case self::ORDER . ':true':
                $wsdl_url = self::ORDER_WSDL_URL_DEV;
                break;
            case self::ORDER . ':false':
                $wsdl_url = self::ORDER_WSDL_URL;
                break;
            case self::PRODUCT . ':false':
                $wsdl_url = self::PRODUCT_WSDL_URL;
                break;
            case self::PRODUCT . ':true':
            default:
                $wsdl_url = self::PRODUCT_WSDL_URL_DEV;
                break;
        }

        return $wsdl_url;
    }
}
