<?php

namespace Axm\DobaApi\Factories;

use Axm\DobaApi\Entity\Supplier;
use Axm\DobaApi\Entity\SupplierCategory;
use Cake\Utility\Hash;

/**
 * Class SupplierFactory
 * @package Axm\DobaApi\Factories
 */
class SupplierFactory extends FactoryBase
{

    /**
     * @param array $supplier_data
     * @return Supplier
     */
    public static function fromSupplierData(array $supplier_data) : Supplier
    {
        /** @var Supplier $supplier */
        $supplier = self::fromArrayData(Supplier::class, $supplier_data);

        $info = SupplierInformationFactory::fromSupplierInformationData($supplier_data['info']);
        $supplier->setSupplierInformation($info);

        $categories_data = Hash::get($supplier_data, 'categories.category', false);
        if ($categories_data) {
            $categories = [];
            foreach ($categories_data as $category_data) {
                $categories[] = self::fromArrayData(SupplierCategory::class, $category_data);
            }
            $supplier->setSupplierCategories($categories);
        }

        return $supplier;
    }

    /**
     * @param array $data
     * @return Supplier[]
     */
    public static function fromArrayOfSupplierData(array $data) : array
    {
        $suppliers_data = Hash::get($data, 'suppliers.supplier', []);

        $suppliers = [];
        foreach ($suppliers_data as $supplier_data) {
            $suppliers[] = self::fromSupplierData($supplier_data);
        }

        return $suppliers;
    }
}
