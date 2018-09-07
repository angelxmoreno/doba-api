<?php

namespace Axm\DobaApi\Factories;

use Axm\DobaApi\Collections\BrandsCollection;
use Axm\DobaApi\Collections\ProductsCollection;
use Axm\DobaApi\Collections\SuppliersCollection;
use Axm\DobaApi\Entity\Brand;
use Axm\DobaApi\Entity\Product;
use Axm\DobaApi\Entity\ProductImage;
use Axm\DobaApi\Entity\ProductPricing;
use Axm\DobaApi\Entity\ProductStatistics;
use Axm\DobaApi\Entity\Supplier;

/**
 * Class ProductFactory
 * @package Axm\DobaApi\Factories
 */
class ProductFactory extends FactoryBase
{
    public const COLLECTION = ProductsCollection::class;

    public static function fromData(
        array $data,
        BrandsCollection $brandsCollection = null,
        SuppliersCollection $suppliersCollection = null
    ) : Product {
        $data['id'] = $data['product_id'];
        $data['sku'] = $data['product_sku'];
        $data['group'] = $data['product_group'];

        foreach ($data as $prop => $val) {
            if ($val === '') {
                unset($data[$prop]);
            }
        }

        $data = static::fixFloats($data, []);
        $data = static::fixArrays($data, ['flags']);
        $data = static::fixDates($data, ['last_update']);

        if ($brandsCollection && isset($data['brand_name']) && $data['brand_name'] !== '') {
            $brand_name = $data['brand_name'];

            $data['brand'] = $brandsCollection->filter(function (Brand $brand) use ($brand_name) {
                return $brand->getName() === $brand_name;
            })->first();
        }

        if ($suppliersCollection && isset($data['supplier_name']) && $data['supplier_name'] !== '') {
            $supplier_name = $data['supplier_name'];

            $data['supplier'] = $suppliersCollection->filter(function (Supplier $supplier) use ($supplier_name) {
                return $supplier->getName() === $supplier_name;
            })->first();
        }

        /** @var Product $product */
        $product = self::hydrate(Product::class, $data);

        /** @var ProductPricing $product_pricing */
        $product_pricing = self::hydrate(ProductPricing::class, $data);
        $product->setPricing($product_pricing);

        /** @var ProductImage $product_image */
        $product_image = self::hydrate(ProductImage::class, $data);
        $product->setImage($product_image);

        /** @var ProductStatistics $product_stats */
        $product_stats = self::hydrate(ProductStatistics::class, $data);
        $product->setStatistics($product_stats);

        return $product;
    }

    public static function fromArrayOfData(
        array $data_array,
        BrandsCollection $brandsCollection = null,
        SuppliersCollection $suppliersCollection = null
    ) : array {
        $objects = [];
        foreach ($data_array as $data) {
            $objects[] = static::fromData($data, $brandsCollection, $suppliersCollection);
        }

        return $objects;
    }

    public static function collectionFromArrayData(
        array $data_array,
        BrandsCollection $brandsCollection = null,
        SuppliersCollection $suppliersCollection = null
    ) {
        $objects_array = static::fromArrayOfData($data_array, $brandsCollection, $suppliersCollection);
        $collection = static::COLLECTION;

        return new $collection($objects_array);
    }
}
