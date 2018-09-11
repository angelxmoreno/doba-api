<?php

namespace Axm\DobaApi\Tests\Unit;

use Axm\DobaApi\Api;
use Axm\DobaApi\Auth;
use Axm\DobaApi\Client;
use Axm\DobaApi\Factory;
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
            return compact('action', 'objRequest');
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
            return compact('action', 'objRequest');
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

    $clients = [
        'ordersClient' => Api::ORDER_METHODS,
        'productsClient' => Api::PRODUCT_METHODS,
    ];
    foreach ($clients as $client_name => $methods) {
        foreach ($methods as $method) {
            describe("->{$method}()", function () use ($client_name, $method) {
                it("calls {$client_name}->{$method}", function () use ($client_name, $method) {
                    $options = ['limit' => random_int(1, 500)];

                    expect($this->{$client_name})
                        ->toReceive('call');

                    $response = $this->api->{$method}($options);

                    $this->expectValidResponse($response, $method, $options);
                });
            });
        }
    }
});
