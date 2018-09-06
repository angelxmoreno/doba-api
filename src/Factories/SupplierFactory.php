<?php

namespace Axm\DobaApi\Factories;

use Axm\DobaApi\Entity\Category;
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
        $supplier_data['name'] = array_key_exists('displayValue', $supplier_data)
            ? $supplier_data['displayValue']
            : $supplier_data['name'];

        /** @var Supplier $supplier */
        $supplier = self::fromArrayData(Supplier::class, $supplier_data);

        if (array_key_exists('info', $supplier_data)) {
            $info = SupplierInformationFactory::fromSupplierInformationData($supplier_data['info']);
            $supplier->setSupplierInformation($info);
        }

        $categories_data = Hash::get($supplier_data, 'categories.category', false);
        if ($categories_data) {
            $categories = [];
            foreach ($categories_data as $category_data) {
                $categories[] = self::fromArrayData(Category::class, $category_data);
            }
            $supplier->setSupplierCategories($categories);
        }

        return $supplier;
    }

    /**
     * @param array $suppliers_data
     * @return Supplier[]
     */
    public static function fromArrayOfSupplierData(array $suppliers_data) : array
    {
        $suppliers = [];
        foreach ($suppliers_data as $supplier_data) {
            $suppliers[] = self::fromSupplierData($supplier_data);
        }

        return $suppliers;
    }
}
