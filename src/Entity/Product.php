<?php

namespace Axm\DobaApi\Entity;

/**
 * Class Product
 * @package Axm\DobaApi\Entity
 *
 * @method int getItemId()
 * @method void setItemId(int $item_id)
 * @method int getId()
 * @method void setId(int $id)
 * @method string getItemSku()
 * @method void setItemSku(string $item_sku)
 * @method string getSku()
 * @method void setSku(string $sku)
 * @method array getFlags()
 * @method void setFlags(array $flags)
 * @method string getTitle()
 * @method void setTitle(string $title)
 * @method string getDescription()
 * @method void setDescription(string $description)
 * @method string getGroup()
 * @method void setGroup(string $group)
 * @method bool getInWarehouse()
 * @method void setInWarehouse(bool $in_warehouse)
 * @method bool getInStock()
 * @method void setInStock(bool $in_stock)
 * @method int getQuantityAvail()
 * @method void setQuantityAvail(int $quantity_avail)
 * @method \DateTimeInterface getLastUpdate()
 * @method void setLastUpdate(\DateTimeInterface $last_update)
 * @method string getSupplierName()
 * @method void setSupplierName(string $supplier_name)
 * @method Supplier getSupplier()
 * @method void setSupplier(Supplier $supplier)
 * @method string getBrandName()
 * @method void setBrandName(string $brand_name)
 * @method Brand getBrand()
 * @method void setBrand(Brand $brand)
 * @method ProductStatistics getStatistics()
 * @method void setStatistics(ProductStatistics $statistics)
 * @method ProductPricing getPricing()
 * @method void setPricing(ProductPricing $pricing)
 * @method ProductImage getImage()
 * @method void setImage(ProductImage $image)
 */
class Product extends EntityBase
{
    /**
     * @var int
     */
    protected $item_id;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $item_sku;

    /**
     * @var string
     */
    protected $sku;

    /**
     * @var array
     */
    protected $flags;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $group;

    /**
     * @var bool
     */
    protected $in_warehouse;

    /**
     * @var bool
     */
    protected $in_stock;

    /**
     * @var int
     */
    protected $quantity_avail;

    /**
     * @var \DateTimeInterface
     */
    protected $last_update;

    /**
     * @var string
     */
    protected $supplier_name;

    /**
     * @var Supplier
     */
    protected $supplier;

    /**
     * @var string
     */
    protected $brand_name;

    /**
     * @var Brand
     */
    protected $brand;

    /**
     * @var ProductStatistics
     */
    protected $statistics;

    /**
     * @var ProductPricing
     */
    protected $pricing;

    /**
     * @var ProductImage
     */
    protected $image;
}
