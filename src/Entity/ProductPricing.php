<?php

namespace Axm\DobaApi\Entity;

/**
 * Class ProductPricing
 * @package Axm\DobaApi\Entity
 *
 * @method float getPrice()
 * @method void setPrice(float $price)
 * @method float getOriginalPrice()
 * @method void setOriginalPrice(float $original_price)
 * @method float getPrepayPrice()
 * @method void setPrepayPrice(float $prepay_price)
 * @method float getDropShipFee()
 * @method void setDropShipFee(float $drop_ship_fee)
 * @method float getMsrp()
 * @method void setMsrp(float $msrp)
 */
class ProductPricing extends EntityBase
{
    /**
     * @var float
     */
    protected $price;

    /**
     * @var float
     */
    protected $original_price;

    /**
     * @var float
     */
    protected $prepay_price;

    /**
     * @var float
     */
    protected $drop_ship_fee;

    /**
     * @var float
     */
    protected $msrp;
}
