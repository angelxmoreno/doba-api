<?php

namespace Axm\DobaApi\Tests\Integration;

use Axm\DobaApi\Api\ProductsApi;
use Axm\DobaApi\Entity\Supplier;
use Axm\DobaApi\Factories\SavedSearchesFactory;

describe(ProductsApi::class, function () {
    xcontext('->getSuppliers()', function () {
        context('when supplier ids are not provided', function () {
            it('get suppliers', function () {
                /** @var ProductsApi $productsApi */
                $productsApi = $this->container->get(ProductsApi::class);
                $suppliers = $productsApi->getSuppliers();

                foreach ($suppliers as $supplier) {
                    expect($supplier)->toBeAnInstanceOf(Supplier::class);
                }
            });
        });
        context('when supplier ids are provided', function () {
            it('get suppliers specified', function () {
                /** @var ProductsApi $productsApi */
                $productsApi = $this->container->get(ProductsApi::class);
                $suppliers = $productsApi->getSuppliers();

                $supplier_ids = [
                    $suppliers[0]->getId(),
                    $suppliers[1]->getId(),
                    $suppliers[2]->getId(),
                ];

                $suppliers = $productsApi->getSuppliers($supplier_ids);

                expect($suppliers)->toHaveLength(count($supplier_ids));

                foreach ($suppliers as $supplier) {
                    expect(in_array($supplier->getId(), $supplier_ids))->toBeTruthy();
                }
            });
        });
    });
    context('->searchCatalog()', function () {
        /** @var ProductsApi $productsApi */
        $productsApi = $this->container->get(ProductsApi::class);
        $response = $productsApi->searchCatalog('ipod');

        $saved_searches = $response['saved_searches']['saved_search'];
        $products = $response['products']['product'];
        $facets = $response['facets']['facet'];

        $categories = collection($facets)->filter(function ($facet) {
            return $facet['display_name'] === 'Categories';
        })->extract('values.value')->first();

        $suppliers = collection($facets)->filter(function ($facet) {
            return $facet['display_name'] === 'Suppliers';
        })->extract('values.value')->first();

        $brands = collection($facets)->filter(function ($facet) {
            return $facet['display_name'] === 'Brands';
        })->extract('values.value')->first();

        unset($response['outcome']);
        unset($response['saved_searches']);
        unset($response['facets']);
        unset($response['products']);
//        print_r(SavedSearchesFactory::fromArrayOfSavedSearchData($saved_searches));
        print_r($products[0]);
//        print_r(SavedSearchesFactory::fromArrayOfSavedSearchData($products));
    });
    xcontext('->getProductDetail()', function () {
    });
    xcontext('->getProductInventory()', function () {
    });
    xcontext('->getListsSummary()', function () {
    });
    xcontext('->editList()', function () {
    });
});
