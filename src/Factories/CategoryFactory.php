<?php

namespace Axm\DobaApi\Factories;

use Axm\DobaApi\Collections\CategoriesCollection;
use Axm\DobaApi\Entity\Category;

/**
 * Class CategoryFactory
 * @package Axm\DobaApi\Factories
 */
class CategoryFactory extends FactoryBase
{
    public const COLLECTION = CategoriesCollection::class;

    /**
     * @param array $data
     * @return Category
     */
    public static function fromData(array $data) : Category
    {
        $data['name'] = $data['displayValue'];

        /** @var Category $category */
        $category = self::hydrate(Category::class, $data);

        return $category;
    }
}
