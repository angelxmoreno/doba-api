<?php

namespace Axm\DobaApi\Factories;

use Axm\DobaApi\Collections\BrandsCollection;
use Axm\DobaApi\Collections\CategoriesCollection;
use Axm\DobaApi\Collections\SuppliersCollection;
use Axm\DobaApi\Response\SearchResponse;

/**
 * Class SearchResponseFactory
 * @package Axm\DobaApi\Factories
 */
class SearchResponseFactory extends FactoryBase
{
    /**
     * @param array $data
     * @return SearchResponse
     */
    public static function fromData(array $data) : SearchResponse
    {
        $products_data = $data['products']['product'];
        unset($data['products']);
        $data['saved_searches'] = $data['saved_searches']['saved_search'];

        $bad_string_props = ['exact_match', 'specials', 'suggestion', 'top_sellers', 'parent_categories'];
        foreach ($bad_string_props as $bad_string_prop) {
            if (array_key_exists($bad_string_prop, $data) && $data[$bad_string_prop] === '') {
                $data[$bad_string_prop] = [];
            }
        }

        $collections = [
            'parent_categories' => CategoryFactory::class,
            'saved_searches' => SavedSearchesFactory::class
        ];

        foreach ($collections as $prop => $factory) {
            if (array_key_exists($prop, $data)) {
                $data_array = $data[$prop];
                $data[$prop] = call_user_func([$factory, 'collectionFromArrayData'], $data_array);
            }
        }

        /** @var SearchResponse $search_response */
        $search_response = self::hydrate(SearchResponse::class, $data);

        $facets = $data['facets']['facet'];

        $categories_data = collection($facets)->filter(function ($facet) {
            return $facet['display_name'] === 'Categories';
        })->extract('values.value')->first();
        $categories = CategoryFactory::fromArrayOfData($categories_data);
        $categories_collection = new CategoriesCollection($categories);
        $search_response->setCategories($categories_collection);

        $suppliers_data = collection($facets)->filter(function ($facet) {
            return $facet['display_name'] === 'Suppliers';
        })->extract('values.value')->first();
        $suppliers = SupplierFactory::fromArrayOfData($suppliers_data);
        $suppliers_collection = new SuppliersCollection($suppliers);
        $search_response->setSuppliers($suppliers_collection);

        $brands_data = collection($facets)->filter(function ($facet) {
            return $facet['display_name'] === 'Brands';
        })->extract('values.value')->first();
        $brands = BrandFactory::fromArrayOfData($brands_data);
        $brands_collection = new BrandsCollection($brands);
        $search_response->setBrands($brands_collection);

        $products = ProductFactory::collectionFromArrayData($products_data, $brands_collection, $suppliers_collection);
        $search_response->setProducts($products);

        return $search_response;
    }
}
