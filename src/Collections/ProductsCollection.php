<?php

namespace Axm\DobaApi\Collections;

use Axm\DobaApi\Entity\Product;

/**
 * Class ProductsCollection
 * @package Axm\DobaApi\Collections
 */
class ProductsCollection extends CollectionBase
{
    protected $collection_type = Product::class;
}
