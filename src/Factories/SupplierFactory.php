<?php

namespace Axm\DobaApi\Factories;

use Axm\DobaApi\Collections\SuppliersCollection;
use Axm\DobaApi\Entity\Category;
use Axm\DobaApi\Entity\Supplier;
use Cake\Utility\Hash;

/**
 * Class SupplierFactory
 * @package Axm\DobaApi\Factories
 */
class SupplierFactory extends FactoryBase
{
    public const COLLECTION = SuppliersCollection::class;

    /**
     * @param array $data
     * @return Supplier
     */
    public static function fromData(array $data) : Supplier
    {
        $data['name'] = array_key_exists('displayValue', $data)
            ? $data['displayValue']
            : $data['name'];

        /** @var Supplier $supplier */
        $supplier = self::hydrate(Supplier::class, $data);

        if (array_key_exists('info', $data)) {
            $info = SupplierInformationFactory::fromData($data['info']);
            $supplier->setSupplierInformation($info);
        }

        $categories_data = Hash::get($data, 'categories.category', false);
        if ($categories_data) {
            $categories = [];
            foreach ($categories_data as $category_data) {
                $categories[] = self::hydrate(Category::class, $category_data);
            }
            $supplier->setSupplierCategories($categories);
        }

        return $supplier;
    }
}
