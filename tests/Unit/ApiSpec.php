<?php

namespace Axm\DobaApi\Tests\Unit;

use Axm\DobaApi\Api;
use Axm\DobaApi\Client;
use Axm\DobaApi\Factory;
use Axm\DobaApi\Tests\TestHelper;
use Kahlan\Plugin\Double;

describe(Api::class, function () {
    describe('methods not implemented', function () {
        it('they throw a', function () {
            $api = new Api(Factory::buildClient('', '', ''));
            $methods = TestHelper::getMethodsArray(Api::class, \ReflectionMethod::IS_PUBLIC);

            foreach ($methods as $method) {
                if (!in_array($method, ['__construct'])) {
                    $closure = function () use ($api, $method) {
                        call_user_func([$api, $method]);
                    };

                    expect($closure)->toThrow(new \BadMethodCallException($method . ' is not yet implemented'));
                }
            }
        });
    });
    describe('->getOrders()', function () {
        xit('getOrders', function () {
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
