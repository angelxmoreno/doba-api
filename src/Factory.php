<?php

namespace Axm\DobaApi\Factories;

use Axm\DobaApi\Api;
use Axm\DobaApi\Auth;
use Axm\DobaApi\Client;

/**
 * Class Factory
 * @package Axm\DobaApi\Factories
 */
class Factory
{
    public function buildApi(string $username, string $password, string $retailer_id) : Api
    {
        $client = static::buildClient($username, $password, $retailer_id);
        $api = new Api($client);

        return $api;
    }

    public static function buildClient(string $username, string $password, string $retailer_id) : Client
    {
        $auth = new Auth($username, $password, $retailer_id);
        $client = new Client($auth);

        return $client;
    }
}