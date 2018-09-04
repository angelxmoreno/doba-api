<?php

namespace Axm\DobaApi\Factories;

use Axm\DobaApi\Entity\Address;
use Axm\DobaApi\Entity\Order;
use Cake\Utility\Hash;

/**
 * Class OrderFactory
 * @package Axm\DobaApi\Factories
 */
class OrderFactory extends FactoryBase
{
    /**
     * @param array $data
     * @return Order[]
     */
    public static function fromArrayOfOrderData(array $data):array
    {
        $orders_data = Hash::get($data, 'orders.order', []);

        $orders = [];
        foreach ($orders_data as $order_data) {
            $orders[] = self::fromOrderData($order_data);
        }

        return $orders;
    }

    /**
     * @param array $order_data
     * @return Order
     */
    public static function fromOrderData(array $order_data) : Order
    {
        /** @var Order $order */
        $order = self::fromArrayData(Order::class, $order_data);

        $billing_address = new Address();
        $billing_address->setName(Hash::get($order_data, 'bill_name'));
        $billing_address->setStreet(Hash::get($order_data, 'bill_street'));
        $billing_address->setCity(Hash::get($order_data, 'bill_city'));
        $billing_address->setState(Hash::get($order_data, 'bill_state'));
        $billing_address->setPostal(Hash::get($order_data, 'bill_postal'));
        $billing_address->setCountry(Hash::get($order_data, 'bill_country'));
        $billing_address->setPhone(Hash::get($order_data, 'bill_phone'));
        $order->setBillingAddress($billing_address);

        $shipping_address = new Address();
        $shipping_address->setName(Hash::get($order_data, 'ship_name'));
        $shipping_address->setStreet(Hash::get($order_data, 'ship_street'));
        $shipping_address->setCity(Hash::get($order_data, 'ship_city'));
        $shipping_address->setState(Hash::get($order_data, 'ship_state'));
        $shipping_address->setPostal(Hash::get($order_data, 'ship_postal'));
        $shipping_address->setCountry(Hash::get($order_data, 'ship_country'));
        $shipping_address->setPhone(Hash::get($order_data, 'ship_phone'));
        $order->setShippingAddress($shipping_address);

        return $order;
    }
}
