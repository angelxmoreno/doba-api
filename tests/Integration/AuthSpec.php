<?php

namespace Axm\DobaApi\Tests\Integration;

use Axm\DobaApi\Factory;

describe('Auth Flow', function () {
    it('Makes a successful call', function () {

        $api = Factory::buildApi(
            $this->container->get('test_user'),
            $this->container->get('test_password'),
            $this->container->get('test_retailer_id')
        );

        $options = ['supplier_ids' => ['2646', '1535', '2693']];

        $response = $api->getSuppliers($options);
        expect($response)->toBeAn('array');
        expect($response)->toHaveLength(count($options['supplier_ids']));
    });
});
