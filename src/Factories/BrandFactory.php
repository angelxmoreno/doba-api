<?php

namespace Axm\DobaApi\Factories;

use Axm\DobaApi\Collections\BrandsCollection;
use Axm\DobaApi\Entity\Brand;

/**
 * Class BrandFactory
 * @package Axm\DobaApi\Factories
 */
class BrandFactory extends FactoryBase
{
    public const COLLECTION = BrandsCollection::class;

    /**
     * @param array $data
     * @return Brand
     */
    public static function fromData(array $data) : Brand
    {
        $data['name'] = $data['displayValue'];

        /** @var Brand $brand */
        $brand = self::hydrate(Brand::class, $data);

        return $brand;
    }
}
