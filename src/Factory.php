<?php

namespace Axm\DobaApi;

/**
 * Class Factory
 * @package Axm\DobaApi
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