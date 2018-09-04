<?php
declare(strict_types=1);

namespace Axm\DobaApi\Entity;

/**
 * Class Supplier
 * @package Axm\DobaApi\Entity
 *
 * @method string getId()
 * @method void setId(string $id)
 * @method string getName()
 * @method void setName(string $name)
 * @method bool getIsPro()
 * @method void setIsPro(bool $is_pro)
 * @method string getGroup()
 * @method void setGroup(string $group)
 * @method SupplierCategory[] getSupplierCategories()
 * @method void setSupplierCategories(SupplierCategory[] $supplier_categories)
 * @method string getInventoryStats()
 * @method void setInventoryStats(string $inventory_stats)
 * @method bool getIsActive()
 * @method void setIsActive(bool $is_active)
 * @method SupplierInformation getSupplierInformation()
 * @method void setSupplierInformation(SupplierInformation $supplier_information)
 */
class Supplier extends EntityBase
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var bool
     */
    protected $is_pro;

    /**
     * @var string
     */
    protected $group;

    /**
     * @var SupplierCategory[]
     */
    protected $supplier_categories = [];

    /**
     * @var string
     */
    protected $inventory_stats;

    /**
     * @var bool
     */
    protected $is_active;

    /**
     * @var SupplierInformation
     */
    protected $supplier_information;
}
