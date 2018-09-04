<?php

namespace Axm\DobaApi\Tests\Unit;

use Axm\DobaApi\Auth;
use Axm\DobaApi\Request;
use Axm\DobaApi\Tests\TestHelper;
use GuzzleHttp\Client as GuzzleClient;
use Kahlan\Plugin\Double;

describe(Request::class, function () {
    given('properties', function () {
        return [
            'username' => 'some_username',
            'password' => 'some_password',
            'retailer_id' => 'some_retailer_id',
        ];
    });

    given('AuthClass', function () {
        return TestHelper::instanceFromArray(Auth::class, $this->properties);
    });

    given('HttpClient', function () {
        $httpClient = Double::instance(['class' => GuzzleClient::class]);
        allow($httpClient)->toReceive('send')->andRun(function ($param) {
            return $param;
        });

        return $httpClient;
    });

    given('Request', function () {
        return TestHelper::instanceFromArray(Request::class, [
            $this->AuthClass,
            $this->HttpClient,
        ]);
    });
    xcontext('->call()', function () {
        it('builds the request url', function () {
            $action = 'fooAction';
            expect($this->Request)
                ->toReceive('buildRequestBody')
                ->once()
                ->with($action);

            $this->Request->call($action);
        });
    });
});
