<?php

namespace Axm\DobaApi\Tests\Integration;

use Axm\DobaApi\Api\ProductsApi;
use Axm\DobaApi\Collections\SuppliersCollection;
use Axm\DobaApi\Entity\Product;
use Axm\DobaApi\Entity\Supplier;
use Axm\DobaApi\Response\SearchResponse;

describe(ProductsApi::class, function () {
    context('->getSuppliers()', function () {
        context('when supplier ids are not provided', function () {
            it('gets suppliers', function () {
                /** @var ProductsApi $productsApi */
                $productsApi = $this->container->get(ProductsApi::class);
                $suppliers_collection = $productsApi->getSuppliers();
                expect($suppliers_collection)->toBeAnInstanceOf(SuppliersCollection::class);
                expect(count($suppliers_collection))->toBeGreaterThan(0);

                foreach ($suppliers_collection as $supplier) {
                    expect($supplier)->toBeAnInstanceOf(Supplier::class);
                }
            });
        });
        context('when supplier ids are provided', function () {
            it('gets suppliers specified', function () {
                /** @var ProductsApi $productsApi */
                $productsApi = $this->container->get(ProductsApi::class);
                $suppliers_collection = $productsApi->getSuppliers();

                $supplier_ids = [
                    $suppliers_collection[0]->getId(),
                    $suppliers_collection[1]->getId(),
                    $suppliers_collection[2]->getId(),
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
        it('creates a search response', function () {
            /** @var ProductsApi $productsApi */
            $productsApi = $this->container->get(ProductsApi::class);
            $search_response = $productsApi->searchCatalog('ipod', 2, 3);

            expect($search_response)->toBeAnInstanceOf(SearchResponse::class);
            expect($search_response->getDisplayStart())->toBe(2);
            expect($search_response->getProducts())->toHaveLength(3);
        });
    });
    fcontext('->getProductDetail()', function () {
        it('gets product details', function () {
            /** @var ProductsApi $productsApi */
            $productsApi = $this->container->get(ProductsApi::class);

            $search_response = $productsApi->searchCatalog('ipod', 2, 3);

            $ids = $search_response->getProducts()->map(function(Product $product){
                return $product->getId();
            })->toArray();

            $response = $productsApi->getProductDetail(['products.product' => $ids]);
            var_export($response);
        });
    });
    xcontext('->getProductInventory()', function () {
    });
    xcontext('->getListsSummary()', function () {
    });
    xcontext('->editList()', function () {
    });
});