<?php
declare(strict_types=1);

namespace Axm\DobaApi\Entity;

/**
 * Class Supplier
 * @package Axm\DobaApi\Entity
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
     * @var Category[]
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

    /**
     * @return string
     */
    public function getId() : string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id) : void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name) : void
    {
        $this->name = $name;
    }

    /**
     * @return bool
     */
    public function isPro() : bool
    {
        return $this->is_pro;
    }

    /**
     * @param bool $is_pro
     */
    public function setIsPro(bool $is_pro) : void
    {
        $this->is_pro = $is_pro;
    }

    /**
     * @return string
     */
    public function getGroup() : string
    {
        return $this->group;
    }

    /**
     * @param string $group
     */
    public function setGroup(string $group) : void
    {
        $this->group = $group;
    }

    /**
     * @return Category[]
     */
    public function getSupplierCategories() : array
    {
        return $this->supplier_categories;
    }

    /**
     * @param Category[] $supplier_categories
     */
    public function setSupplierCategories(array $supplier_categories) : void
    {
        $this->supplier_categories = $supplier_categories;
    }

    /**
     * @return string
     */
    public function getInventoryStats() : string
    {
        return $this->inventory_stats;
    }

    /**
     * @param string $inventory_stats
     */
    public function setInventoryStats(string $inventory_stats) : void
    {
        $this->inventory_stats = $inventory_stats;
    }

    /**
     * @return bool
     */
    public function isActive() : bool
    {
        return $this->is_active;
    }

    /**
     * @param bool $is_active
     */
    public function setIsActive(bool $is_active) : void
    {
        $this->is_active = $is_active;
    }

    /**
     * @return SupplierInformation
     */
    public function getSupplierInformation() : SupplierInformation
    {
        return $this->supplier_information;
    }

    /**
     * @param SupplierInformation $supplier_information
     */
    public function setSupplierInformation(SupplierInformation $supplier_information) : void
    {
        $this->supplier_information = $supplier_information;
    }


}
