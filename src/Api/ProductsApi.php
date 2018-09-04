<?php

namespace Axm\DobaApi\Api;

use Axm\DobaApi\Entity\Supplier;
use Axm\DobaApi\Factories\SupplierFactory;

/**
 * Class ProductsApi
 * @package Axm\DobaApi\Api
 */
class ProductsApi extends ApiBase
{
    /**
     * @param string[] $supplier_ids
     * @return Supplier[]
     * @throws \Axm\DobaApi\DobaResponseException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function getSuppliers(array $supplier_ids = []) : array
    {
        $options = count($supplier_ids)
            ? ['supplier_ids.supplier_id' => $supplier_ids]
            : [];
        $response = $this->getRequest()->call('getSuppliers', $options);

        return SupplierFactory::fromArrayOfSupplierData($response);
    }

    public function searchCatalog(array $options = [])
    {
        throw new \BadMethodCallException('searchCatalog is not yet implemented');
    }

    public function getProductDetail(array $options = [])
    {
        throw new \BadMethodCallException('getProductDetail is not yet implemented');
    }

    public function getProductInventory(array $options = [])
    {
        throw new \BadMethodCallException('getProductInventory is not yet implemented');
    }

    public function getListsSummary(array $options = [])
    {
        throw new \BadMethodCallException('getListsSummary is not yet implemented');
    }

    public function editList(array $options = [])
    {
        throw new \BadMethodCallException('editList is not yet implemented');
    }
}
