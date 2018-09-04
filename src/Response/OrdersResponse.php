<?php

namespace Axm\DobaApi\Response;

use Axm\DobaApi\Entity\Order;

/**
 * Class OrdersResponse
 * @package Axm\DobaApi\Response
 *
 * @method int getResultTotal()
 * @method void setResultTotal(int $result_total)
 * @method int getOverallNumberOfOrders()
 * @method void setOverallNumberOfOrders(int $overall_number_of_orders)
 * @method float getOverallTotalSpent()
 * @method void setOverallTotalSpent(float $overall_total_spent)
 * @method Order[] getOrders()
 * @method void setOrders(array $orders)
 *
 * @SuppressWarnings("LongVariable")
 */
class OrdersResponse extends ResponseBase
{
    /**
     * @var int
     */
    protected $result_total;

    /**
     * @var int
     * @todo inquire what is the difference between result_total and overall_number_of_orders
     * @todo shorten this name and use the factory to map the property from the api to the new variable name
     *
     */
    protected $overall_number_of_orders;

    /**
     * @var float
     */
    protected $overall_total_spent;

    /**
     * @var Order[]
     */
    protected $orders;
}
