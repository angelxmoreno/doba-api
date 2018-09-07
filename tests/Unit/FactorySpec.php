<?php

namespace Axm\DobaApi\Tests\Unit;

use Axm\DobaApi\Api;
use Axm\DobaApi\Client;
use Axm\DobaApi\Factory;

describe(Factory::class, function () {
    describe('->buildApi()', function () {
        it('builds an Api object', function () {
            $obj = Factory::buildApi('', '', '');

            expect($obj)->toBeAnInstanceOf(Api::class);
        });
    });
    describe('::buildClient()', function () {
        it('builds a Client object', function () {
            $obj = Factory::buildClient('', '', '');

            expect($obj)->toBeAnInstanceOf(Client::class);
        });
    });
});
