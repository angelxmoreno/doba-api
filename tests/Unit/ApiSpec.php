<?php

namespace Axm\DobaApi\Tests\Unit;

use Axm\DobaApi\Api;
use Axm\DobaApi\Auth;
use Axm\DobaApi\Client;
use Axm\DobaApi\Factory;
use Axm\DobaApi\Tests\TestHelper;
use Kahlan\Plugin\Double;

describe(Api::class, function () {
    given('soapClient', function () {
        $client = Double::instance([
            'extends' => \SoapClient::class,
            'methods' => ['__construct'],
            'magicMethods' => true
        ]);

        return $client;
    });

    given('auth', function () {
        return new Auth('', '', '');
    });
    given('ordersClient', function () {
        $client = Double::instance([
            'extends' => Client::class,
            'args' => [$this->auth]
        ]);
        $client->setWsdlUrl(Factory::getWsdlUrl(Factory::ORDER, true));
        allow($client)->toReceive('buildSoapClient')->andReturn($this->soapClient);
        allow($client)->toReceive('getResponse')->andRun(function (string $action, $objRequest) {
            $response = new \stdClass();
            $response->action = $action;
            $response->objRequest = $objRequest;

            return $response;
        });

        return $client;
    });
    given('productsClient', function () {
        $client = Double::instance([
            'extends' => Client::class,
            'args' => [$this->auth]
        ]);
        $client->setWsdlUrl(Factory::getWsdlUrl(Factory::PRODUCT, true));
        allow($client)->toReceive('buildSoapClient')->andReturn($this->soapClient);
        allow($client)->toReceive('getResponse')->andRun(function (string $action, $objRequest) {
            $response = new \stdClass();
            $response->action = $action;
            $response->objRequest = $objRequest;

            return $response;
        });

        return $client;
    });
    given('api', function () {
        return new Api($this->ordersClient, $this->productsClient);
    });

    given('expectValidResponse', function () {
        return function (array $response, string $action, array $options) {
            expect($response)->toContainKey('action');
            expect($response['action'])->toBe($action);

            expect($response)->toContainKey('objRequest');

            expect($response['objRequest'])->toContainKey('authentication');
            expect($response['objRequest']['authentication'])->toContainKey('username');
            expect($response['objRequest']['authentication']['username'])->toBe($this->auth->getUserName());
            expect($response['objRequest']['authentication'])->toContainKey('password');
            expect($response['objRequest']['authentication']['password'])->toBe($this->auth->getPassword());

            expect($response['objRequest'])->toContainKey('retailer_id');
            expect($response['objRequest']['retailer_id'])->toBe($this->auth->getRetailerId());

            foreach ($options as $key => $val) {
                expect($response['objRequest'])->toContainKey($key);
                expect($response['objRequest'][$key])->toBe($val);
            }
        };
    });
    describe('methods not implemented', function () {
        it('will throw a BadMethodCallException', function () {
            $methods = TestHelper::getMethodsArray(Api::class, \ReflectionMethod::IS_PUBLIC);

            foreach ($methods as $method) {
                if (!in_array($method, ['__construct', 'getOrders'])) {
                    $api = $this->api;
                    $closure = function () use ($api, $method) {
                        call_user_func([$api, $method]);
                    };

                    expect($closure)->toThrow(new \BadMethodCallException($method . ' is not yet implemented'));
                }
            }
        });
    });
    describe('->getOrders()', function () {
        fit('gets Orders', function () {
            $options = ['limit' => 3];

            expect($this->ordersClient)
                ->toReceive('call');

            $response = $this->api->getOrders($options);

            $this->expectValidResponse($response, 'getOrders', $options);
        });
    });
    describe('->getOrderDetail()', function () {
        xit('getOrderDetail', function () {
        });
    });
    describe('->orderLookup()', function () {
        xit('orderLookup', function () {
        });
    });
    describe('->createOrder()', function () {
        xit('createOrder', function () {
        });
    });
    describe('->fundOrder()', function () {
        xit('fundOrder', function () {
        });
    });
    describe('->getSuppliers()', function () {
        xit('getSuppliers', function () {
        });
    });
    describe('->searchCatalog()', function () {
        xit('searchCatalog', function () {
        });
    });
    describe('->getProductDetail()', function () {
        xit('getProductDetail', function () {
        });
    });
    describe('->getProductInventory()', function () {
        xit('getProductInventory', function () {
        });
    });
    describe('->getListsSummary()', function () {
        xit('getListsSummary', function () {
        });
    });
    describe('->editList()', function () {
        xit('editList', function () {
        });
    });
});
