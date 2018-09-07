<?php

namespace Axm\DobaApi\Collections;

use Axm\DobaApi\Entity\Category;

/**
 * Class CategoriesCollection
 * @package Axm\DobaApi\Collections
 */
class CategoriesCollection extends CollectionBase
{
    protected $collection_type = Category::class;
}
