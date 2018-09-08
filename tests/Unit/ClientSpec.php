<?php

namespace Axm\DobaApi\Tests\Unit;

use Axm\DobaApi\Auth;
use Axm\DobaApi\Client;
use Axm\DobaApi\Factory;
use Axm\DobaApi\Tests\TestHelper;
use Kahlan\Plugin\Double;

describe(Client::class, function () {
    beforeAll(function () {
        $this->auth = new Auth('some_username', 'some_password', 'some_retail_id');
        $this->client = new Client($this->auth);
        $this->client->setWsdlUrl(Factory::PRODUCT_WSDL_URL_DEV);
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

            $client = new Client($this->auth);
            $client->setWsdlUrl(Factory::PRODUCT_WSDL_URL_DEV);
            $soap_client = Double::instance([
                'extends' => \SoapClient::class,
                'args' => [$client->getWsdlUrl(), $client->getSoapOptions()]
            ]);
            allow($client)->toReceive('buildSoapClient')->andReturn($soap_client);
            allow($soap_client)->toReceive('getSuppliers')->andReturn(['supplier1', 'supplier2', 'supplier3']);
            $response = $client->call($action, $options);

            expect($response)->toHaveLength(count($options['supplier_ids']));
        });
    });
});
