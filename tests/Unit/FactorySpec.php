<?php

namespace Axm\DobaApi\Tests\Unit;

use Axm\DobaApi\Api;
use Axm\DobaApi\Client;
use Axm\DobaApi\Factory;
use Axm\DobaApi\Tests\TestHelper;

describe(Factory::class, function () {
    describe('::buildApi()', function () {
        it('builds an Api object', function () {
            $obj = Factory::buildApi('', '', '');

            expect($obj)->toBeAnInstanceOf(Api::class);
        });

        it('builds ' . Client::class . ' for orders', function () {
            $obj = Factory::buildApi('', '', '');

            /** @var Client $client */
            $client = TestHelper::getProperty($obj, 'order_client');
            expect($client)->toBeAnInstanceOf(Client::class);
            expect($client->getWsdlUrl())->toBe(Factory::ORDER_WSDL_URL_DEV);
        });

        it('builds ' . Client::class . ' for products', function () {
            $obj = Factory::buildApi('', '', '');

            /** @var Client $client */
            $client = TestHelper::getProperty($obj, 'product_client');
            expect($client)->toBeAnInstanceOf(Client::class);
            expect($client->getWsdlUrl())->toBe(Factory::PRODUCT_WSDL_URL_DEV);
        });
    });
    describe('::buildClient()', function () {
        it('builds a Client object', function () {
            $obj = Factory::buildClient('', '', '');

            expect($obj)->toBeAnInstanceOf(Client::class);
        });
    });
});
