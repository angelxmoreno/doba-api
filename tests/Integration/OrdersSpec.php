<?php

use Axm\DobaApi\Api\OrdersApi;
use Axm\DobaApi\Response\OrdersResponse;

describe(OrdersApi::class, function () {
    context('->getOrders()', function () {
        it('gets orders', function () {
            /** @var OrdersApi $ordersApi */
            $ordersApi = $this->container->get(OrdersApi::class);
            $limit = 4;
            $response = $ordersApi->getOrders(['limit' => $limit, 'statuses.statuse' => ['Shipped']]);

            expect($response)->toBeAnInstanceOf(OrdersResponse::class);
            expect($response->getOrders())->toHaveLength($limit);
        });
    });

    context('->getOrderDetail()', function () {
        it('gets orders', function () {
            /** @var OrdersApi $ordersApi */
            $ordersApi = $this->container->get(OrdersApi::class);
            $limit = 3;
            $response = $ordersApi->getOrders(['limit' => $limit]);
            $order_ids = \Cake\Utility\Hash::extract($response->toArray(), 'orders.{n}.order_id');

            $response = $ordersApi->getOrderDetail([
                'order_ids.order_id' => $order_ids
            ]);

            expect($response)->toBeAn('array');
            expect($response)->toHaveLength($limit);
        });
    });
});
