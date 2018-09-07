<?php

namespace Axm\DobaApi\Entity;

/**
 * Class ProductStatistics
 * @package Axm\DobaApi\Entity
 *
 * @method int getItemCountInSpecifiedList()
 * @method void setItemCountInSpecifiedList(int $item_count_in_specified_list)
 * @method \DateTimeInterface getMinDealStartDate()
 * @method void setMinDealStartDate(\DateTimeInterface $min_deal_start_date)
 * @method \DateTimeInterface getMaxDealStartDate()
 * @method void setMaxDealStartDate(\DateTimeInterface $max_deal_start_date)
 * @method \DateTimeInterface getMinDealEndDate()
 * @method void setMinDealEndDate(\DateTimeInterface $min_deal_end_date)
 * @method \DateTimeInterface getMaxDealEndDate()
 * @method void setMaxDealEndDate(\DateTimeInterface $max_deal_end_date)
 * @method string getOriginalMinCost()
 * @method void setOriginalMinCost(string $original_min_cost)
 * @method string getOriginalMaxCost()
 * @method void setOriginalMaxCost(string $original_max_cost)
 * @method float getMinCost()
 * @method void setMinCost(float $min_cost)
 * @method float getMaxCost()
 * @method void setMaxCost(float $max_cost)
 * @method int getMinQty()
 * @method void setMinQty(int $min_qty)
 * @method int getMaxQty()
 * @method void setMaxQty(int $max_qty)
 * @method int getItemCount()
 * @method void setItemCount(int $item_count)
 * @method int getItemCountInWarehouse()
 * @method void setItemCountInWarehouse(int $item_count_in_warehouse)
 */
class ProductStatistics extends EntityBase
{
    /**
     * @var int
     */
    protected $item_count_in_specified_list;

    /**
     * @var \DateTimeInterface
     */
    protected $min_deal_start_date;

    /**
     * @var \DateTimeInterface
     */
    protected $max_deal_start_date;

    /**
     * @var \DateTimeInterface
     */
    protected $min_deal_end_date;

    /**
     * @var \DateTimeInterface
     */
    protected $max_deal_end_date;

    /**
     * @var string
     */
    protected $original_min_cost;

    /**
     * @var string
     */
    protected $original_max_cost;

    /**
     * @var float
     */
    protected $min_cost;

    /**
     * @var float
     */
    protected $max_cost;

    /**
     * @var int
     */
    protected $min_qty;

    /**
     * @var int
     */
    protected $max_qty;

    /**
     * @var int
     */
    protected $item_count;

    /**
     * @var int
     */
    protected $item_count_in_warehouse;
}
