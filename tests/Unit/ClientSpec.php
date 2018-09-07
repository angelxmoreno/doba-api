<?php

namespace Axm\DobaApi\Tests\Unit;

use Axm\DobaApi\Auth;
use Axm\DobaApi\Client;
use Axm\DobaApi\Tests\TestHelper;

describe(Client::class, function () {
    beforeAll(function () {
        $this->auth = new Auth('twhitney9aisle', 'sandbox', '1223961');
        $this->client = new Client($this->auth);
    });

    describe('->getSoapClient()', function () {
        context('When no previous client was found', function () {
            it('builds one and returns it', function () {
                $previous = TestHelper::getProperty($this->client, 'soapClient');
                expect($previous)
                    ->toBeNull();

                $current = $this->client->getSoapClient();
                expect($current)
                    ->not
                    ->toBeNull();

                $actual = TestHelper::getProperty($this->client, 'soapClient');
                expect($actual)
                    ->toBe($current);
            });
        });

        context('When a previous client was constructed', function () {
            it('uses the previous one', function () {
                $this->client->getSoapClient();

                $previous = TestHelper::getProperty($this->client, 'soapClient');
                expect($previous)
                    ->not
                    ->toBeNull();

                $current = $this->client->getSoapClient();

                expect($current)
                    ->toBe($previous);
            });
        });
    });

    describe('->call()', function () {
        it('makes a call using the soap client', function () {
            $action = 'getSuppliers';
            $options = ['supplier_ids' => [2646, 1535, 2693]];

            $this->client->setAuth($this->auth);
            $response = $this->client->call($action, $options);

            expect($response)->toHaveLength(count($options['supplier_ids']));
        });
    });
});
