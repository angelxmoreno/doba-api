<?php

namespace Axm\DobaApi\Factories;

use Axm\DobaApi\Entity\Category;

/**
 * Class CategoryFactory
 * @package Axm\DobaApi\Factories
 */
class CategoryFactory extends FactoryBase
{
    /**
     * @param array $category_data
     * @return Category
     */
    public static function fromCategoryData(array $category_data) : Category
    {
        $category_data['name'] = $category_data['displayValue'];

        /** @var Category $category */
        $category = self::fromArrayData(Category::class, $category_data);

        return $category;
    }

    /**
     * @param array $categories_data
     * @return Category[]
     */
    public static function fromArrayOfCategoryData(array $categories_data) : array
    {
        $categories = [];
        foreach ($categories_data as $category_data) {
            $categories[] = self::fromCategoryData($category_data);
        }

        return $categories;
    }
}
