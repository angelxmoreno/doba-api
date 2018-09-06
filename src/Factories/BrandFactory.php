<?php

namespace Axm\DobaApi\Factories;

use Axm\DobaApi\Entity\Brand;

/**
 * Class BrandFactory
 * @package Axm\DobaApi\Factories
 */
class BrandFactory extends FactoryBase
{
    /**
     * @param array $brand_data
     * @return Brand
     */
    public static function fromBrandData(array $brand_data) : Brand
    {
        $brand_data['name'] = $brand_data['displayValue'];

        /** @var Brand $brand */
        $brand = self::fromArrayData(Brand::class, $brand_data);

        return $brand;
    }

    /**
     * @param array $brands_data
     * @return Brand[]
     */
    public static function fromArrayOfBrandData(array $brands_data) : array
    {
        $brands = [];
        foreach ($brands_data as $brand_data) {
            $brands[] = self::fromBrandData($brand_data);
        }

        return $brands;
    }
}
