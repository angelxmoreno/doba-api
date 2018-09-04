<?php

namespace Axm\DobaApi\Tests\Integration;

use Axm\DobaApi\Api\ProductsApi;
use Axm\DobaApi\Entity\Supplier;

describe(ProductsApi::class, function () {
    context('->getSuppliers()', function () {
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
    xcontext('->searchCatalog()', function () {
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
