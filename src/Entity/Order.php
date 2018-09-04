<?php

namespace Axm\DobaApi\Entity;

use Rakshazi\GetSetTrait;

/**
 * Class Order
 * @package Axm\DobaApi\Entity
 *
 * @method string getRetailerId()
 * @method void setRetailerId(string $retailer_id)
 * @method string getOrderId()
 * @method void setOrderId(string $order_id)
 * @method string getOrderGroupId()
 * @method void setOrderGroupId(string $order_group_id)
 * @method string getPoNumber()
 * @method void setPoNumber(string $po_number)
 * @method string getStatus()
 * @method void setStatus(string $status)
 * @method array getStatuses()
 * @method void setStatuses(array $statuses)
 * @method float getSubtotal()
 * @method void setSubtotal(float $subtotal)
 * @method float getShippingFees()
 * @method void setShippingFees(float $shipping_fees)
 * @method float getDropShipFees()
 * @method void setDropShipFees(float $drop_ship_fees)
 * @method float getOrderTotal()
 * @method void setOrderTotal(float $order_total)
 * @method Address getShippingAddress()
 * @method void setShippingAddress(Address $shipping_address)
 * @method Address getBillingAddress()
 * @method void setBillingAddress(Address $billing_address)
 * @method string getPaymentMethods()
 * @method void setPaymentMethods(string $payment_methods)
 * @method string getCanPay()
 * @method void setCanPay(string $can_pay)
 * @method string getIsPaid()
 * @method void setIsPaid(string $is_paid)
 * @method array getSuppliers()
 * @method void setSuppliers(array $suppliers)
 * @method \DateTimeInterface getDatePlaced()
 * @method void setDatePlaced(\DateTimeInterface $date_placed)
 */
class Order extends EntityBase
{
    use GetSetTrait;

    /**
     * @var string
     */
    protected $retailer_id;

    /**
     * @var string
     */
    protected $order_id;

    /**
     * @var string
     */
    protected $order_group_id;

    /**
     * @var string
     */
    protected $po_number;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var array
     */
    protected $statuses;

    /**
     * @var float
     */
    protected $subtotal;

    /**
     * @var float
     */
    protected $shipping_fees;

    /**
     * @var float
     */
    protected $drop_ship_fees;

    /**
     * @var float
     */
    protected $order_total;

    /**
     * @var Address
     */
    protected $shipping_address;
    /**
     * @var Address
     */
    protected $billing_address;

    /**
     * @var string
     */
    protected $payment_methods;

    /**
     * @var string
     */
    protected $can_pay;

    /**
     * @var string
     */
    protected $is_paid;

    /**
     * @var array
     */
    protected $suppliers;

    /**
     * @var \DateTimeInterface
     */
    protected $date_placed;
}
