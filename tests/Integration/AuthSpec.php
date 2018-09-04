<?php

namespace Axm\DobaApi\Tests\Integration;

use Axm\DobaApi\Auth;
use Axm\DobaApi\Request;
use GuzzleHttp\Client;

describe('Auth Flow', function () {
    it('Makes a successful call', function () {
        $auth = new Auth('mikeb', 'password', '1765191');
        $client = new Client();
        $request = new Request($auth, $client);
        $response = $request->call('getSuppliers');

        expect($response)->toBeAn('array');
    });
});
